<?php
    class User {
        public $username;
        public $password;
        public $email;
        public $account_status;
        public $group_id;
        public $last_login;

        public function __construct($username, $password, $email, $account_status, $group_id, $last_login) {
            $this->username = $username;
            $this->password = $password;
            $this->email = $email;
            $this->account_status = $account_status;
            $this->group_id = $group_id;
            $this->last_login = $last_login;
        }
    }
?>