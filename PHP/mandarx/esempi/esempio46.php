<!DOCTYPE html>
<html>
<head>
    <title>Traits</title>
</head>
<body>
    <h3>Trait</h3>
    <?php   

    trait Logger
    {
        public function log_action($username, $action)
        {
            echo "[LOG] <b>$username</b> ha eseguito l’azione <i>$action</i><br>";
        }
    }

    trait PermissionCheck
    {
        public function check_permission($permissions, $username, $action)
        {
            if (!isset($permissions[$username]))
                return false;

           return in_array($action, $permissions[$username]);
        }
    }

    class Actions
    {
        use Logger, PermissionCheck;

        private $permissions =
        [
            'alice' => ['read', 'write'],
            'bob'   => ['read'],
            'carol' => ['read', 'write', 'delete'],
            'admin' => ['read', 'write', 'delete', 'addPermission', 'removePermission'],
        ];

        public function perform_action(User $user, $action)
        {
            if ($this->check_permission($this->permissions, $user->get_name(), $action))
            {
                echo "<img src='/imgs/ok.jpg' width='10'>Accesso CONSENTITO per <b>{$user->get_name()}</b> all’azione <i>$action</i><br>";
                return true;
            }
            else
            {
                echo "<img src='/imgs/ko.jpg' width='10'>Accesso NEGATO per <b>{$user->get_name()}</b> all’azione <i>$action</i><br>";
                return false;
            }
        }

        public function add_permission(User $user, $username, $action)
        {
            if ($this->check_permission($this->permissions, $user->get_name(), "addPermission"))
                $this->permissions[$username][] = $action;
        }

        public function remove_permission(User $user, $username, $action)
        {
            if ($this->check_permission($this->permissions, $user->get_name(), "removePermission"))
            {
                if (isset($this->permissions[$username]))
                {
                    // rimuove e reindicizza per evitare buchi nelle chiavi
                    $this->permissions[$username] = array_values(array_diff($this->permissions[$username], [$action]));
                }
            }
        }
    }

    class User
    {
        use Logger;

        protected $name;

        public function __construct($name)
        {
            $this->name = $name;
        }

        public function get_name()
        {
            return $this->name;
        }

        public function perform_action(Actions $actions, $action)
        {
            if($actions->perform_action($this, $action))
                $this->log_action($this->name, $action);
        }
    }

    class Admin extends User
    {
        public function grant(Actions $actions, $username, $action)
        {
            $actions->add_permission($this, $username, $action);
            $this->log_action($this->name, "grant</i> di <i>$action</i> per l'utente <b>$username</b>");
        }

        public function revoke(Actions $actions, $username, $action)
        {
            $actions->remove_permission($this, $username, $action);
            $this->log_action($this->name, "revoke</i> di <i>$action</i> per l'utente <b>$username</b>");
        }
    }


    $actions = new Actions();

    $admin = new Admin("admin");
    $userAlice = new User("alice");
    $userBob = new User("bob");
    $userCarol = new User("carol");

    // Alice prova a eseguire un'azione per cui ha il permesso
    $userAlice->perform_action($actions, "read");
    echo "<br>";

    // Alice prova a eseguire un'azione per cui non ha il permesso
    $userAlice->perform_action($actions, "delete");
    echo "<br>";

    // Bob prova a eseguire un'azione per cui non ha il permesso
    $userBob->perform_action($actions, "write");
    echo "<br>";

    // l’admin modifica i permessi
    $admin->grant($actions, "bob", "write");

    // Bob prova a eseguire un'azione per cui ora ha il permesso
    $userBob->perform_action($actions, "write");
    echo "<br>";

    // Carol prova a eseguire un'azione per cui ha il permesso
    $userCarol->perform_action($actions, "delete");
    echo "<br>";

    // l’admin modifica i permessi
    $admin->revoke($actions, "carol", "delete");

    // Carolprova a eseguire un'azione per cui non ha più il permesso
    $userCarol->perform_action($actions, "delete");
    echo "<br>";



    


    ?>
</body>
</html>
