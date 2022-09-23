<?
class db {
    
    var $db_type;
    var $db_server;
    var $db_name;
    var $db_user;
    var $db_pass;
    var $db_persistent;
    var $dbh;
    
    function db() {
        
    
        $this->db_type = 1;
        $this->db_server = 'localhost';
        $this->db_name = 'db';
        $this->db_user = 'user';
        $this->db_pass = 'pass';
        $this->db_persistent = 0;
                $this->db_connect();
        
    } //end constructor
    
    function db_connect () {
        
        // mySQL 
        if($this->db_type == 1) {
            if ($this->db_persistent)
                $this->dbh = @mysql_pconnect($this->db_server, $this->db_user, $this->db_pass);
            else
                $this->dbh = @mysql_connect($this->db_server, $this->db_user, $this->db_pass);

            if (!$this->dbh) {
                printf("Error: Connection to MySQL server '%s' failed.<BR>\n", $this->db_server);
                return;
            }

            if (!@mysql_select_db($this->db_name, $this->dbh)) {
                printf("Error: Connection to MySQL database '%s' failed.<BR>\n>%s: %s<BR>\n", $this->db_name, @mysql_errno($this->dbh), @mysql_error($this->dbh));
                return;
            }
        }
        //end mySQL
    } //end db_connect()
    
    function db_query ($query) {
        
        // mySQL 
        if($this->db_type == 1) {
            $result = mysql_query($query, $this->dbh)
                or die ("Error: A problem was encountered while executing this query.");
            
            return $result;
        }
        //end mySQL
    } //end db_query()
    
    function db_numrows ($result) {
        
        switch($this->db_type) {
            case 1: //mySQL
                return mysql_num_rows($result);
        
        } //end switch
    } // end db_numrows()
    
    function db_fetch_array (&$result) {
        
        switch($this->db_type) {
            case 1: //mySQL
                return mysql_fetch_array($result);
        } //end switch
    } //end db_fetch_array()
    
            
} //end class db

class authenticate {
    
    var $db;
    var $salt;
    
    function authenticate() {
        
        
        $this->db = new db;
//      $this->salt = 'a552avf1ss';
        $this->salt = 'b3123mm3k9';
        
        
    } //end constructor

    
    function login($uname, $pword) {
        
        $query = "SELECT username FROM users WHERE username = '" . $uname . "' AND password = '" . crypt($pword, $this->salt) . "'";
        $result = $this->db->db_query($query);
        if($this->db->db_numrows($result) > 0) {
            $secret = crypt($uname,$this->salt);
            setcookie("mysite", "$uname:$secret");            
            return 1;
        } else {
            return 0;
        }
    } //end login()
    
    function createUser($uname,$pword,$email) {
        srand(make_seed());
        $randval = rand();
        $query = "INSERT authorize(username,password,accesslevel,email,id) VALUES ('" . $uname . "','" . crypt($pword,$this->salt) . "',0,'" . $email ."','" . $randval . "')";
        $result = $this->db->db_query($query);
        $message = "This message has been sent to you because you requested a login for mysite.com.\n\n";
        $message .= "Please use the following URL to verify your email address and be added to the userlist.\n\n";
        $message .= "http://mysite.com/newuser.php?email=" . $email . "&id=" . $randval . "\n\n";
        $message .= "Please note that if you have recieved this message in error, or you do not want to sign up, you do not need to do anything.\nYou will not be added to the listing unless you use the proceeding URL.\n\n";
        $message .= "Thanks for visiting our site!\n";
        mail($email, "mysite.com - account confirmation", $message, "From: register@mysite.com");
        
    }
    
    function checkUsername($uname) {
        $query = "SELECT * FROM users where username='" . $uname ."'";
        $result = $this->db->db_query($query);
        if($this->db->db_numrows($result) > 0) {            
            return 0;
        } else {
            return 1;
        }
    }
    
    function validateUser($email,$id) {
        $query = "SELECT * FROM authorize WHERE email='" . $email . "' AND id='" . $id ."'";
        $result = $this->db->db_query($query);
        if($this->db->db_numrows($result) > 0) {
            $row = $this->db->db_fetch_array($result);
            $query = "INSERT users(user_id,username,password,accesslevel,email) VALUES ('','" . $row['username'] . "','" . $row['password'] . "',1,'" . $row['email'] ."')";
            $result = $this->db->db_query($query);
            $query = "SELECT user_id FROM users WHERE username='" . $row['username'] ."'";
            $result = $this->db->db_query($query);
            $row = $this->db->db_fetch_array($result);
            $query = "DELETE FROM authorize WHERE id='" . $id ."'";
            $result = $this->db->db_query($query);
            return 1;
        } else {
            return 0;
        }
    }
    
    function logout() {
        
        setcookie("mysite");
    } //end logout()
    
    function checkLogin() {
        global $HTTP_COOKIE_VARS;

        $array = explode(":", $HTTP_COOKIE_VARS['mysite']);
        if(crypt($array[0], $this->salt) == $array[1]) {
            return 1;
        } else {
            return 0;
        }
    } //end checkLogin()
    
    function getName() {
        global $HTTP_COOKIE_VARS;
        $array = explode(":", $HTTP_COOKIE_VARS['mysite']);
        return $array[0];
    }
    
    function getLevel() {
        $logged = $this->checkLogin();
        if($logged) {
            $username = $this->getName();
            $query = "SELECT accesslevel FROM users WHERE username='" . $username . "'";
            $result = $this->db->db_query($query);
            $row = $this->db->db_fetch_array($result);
            return $row['accesslevel'];
        } else {
            return 0;
        }
    }
    
    function getID() {
        $logged = $this->checkLogin();
        if($logged) {
            $username = $this->getName();
            $query = "SELECT user_id FROM users WHERE username='" . $username . "'";
            $result = $this->db->db_query($query);
            $row = $this->db->db_fetch_array($result);
            return $row['user_id'];
        } else {
            return 0;
        }
    }
    
        
} //end class authenticate
?>
####table structures
CREATE TABLE authorize (
  username varchar(15) NOT NULL default '',
  password varchar(20) NOT NULL default '',
  accesslevel tinyint(4) NOT NULL default '0',
  email varchar(30) NOT NULL default '',
  id varchar(30) NOT NULL default '',
  PRIMARY KEY  (username)
) TYPE=MyISAM;
CREATE TABLE users (
  user_id int(10) unsigned NOT NULL auto_increment,
  username varchar(15) NOT NULL default '',
  password varchar(20) NOT NULL default '',
  accesslevel tinyint(4) NOT NULL default '0',
  email varchar(30) NOT NULL default '',
  PRIMARY KEY  (username),
  KEY user_id (user_id)
) TYPE=MyISAM; 