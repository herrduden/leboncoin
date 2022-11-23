<?php

    include(__DIR__."\\Controllers\\LandingController.php");
    include(__DIR__."\\Controllers\\LoginController.php");

    class Index{

        // Constructeur
        private function __construct()
        {
            return;
        }
        
        // webApplication Launcher...
        public static function main(){
            // Config pour Assets...
            $GLOBALS['__HOST__'] = "http://127.0.0.1/leboncoin/";
            $GLOBALS['WINDOW_TITLE'] = "Bienvenue sur le boncoin site de petites annonces";
            // [REDIRECT_QUERY_STRING] => url=toto
            // Ici si pas de route de demander alors on revoit vers la page d'accueil.
            // isset <=> exist
            if(isset($_SERVER['REDIRECT_QUERY_STRING']) && ($_SERVER['REDIRECT_QUERY_STRING'] != NULL || $_SERVER['REDIRECT_QUERY_STRING'] != '')){ 
                $root = str_replace("url=", "", $_SERVER['REDIRECT_QUERY_STRING']);
                switch(strtolower($root)){
                    case "log-in":// TODO: First Example
                        $controller = new LoginController("sign-in");
                        break;
                    case "log-out": // TODO:
                        echo "Requested URL is LogOut";
                        break;
                    case "deposer-une-annonce": // TODO:
                        echo "Requested URL is deposer-une-annonce";
                        break;
                    default: // TODO:
                        echo "URL NOT FOUND 404 !";
                }
            }else{
                // Cas ou on doit redériger vers la page d'accueil;
                $controller = new LandingController("home");
            }
        }
    }
    
    // Start WebApp
    Index::main();
?>