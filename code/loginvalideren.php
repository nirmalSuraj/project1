<?php
//aanmaken van new validatie object
        $_valideren=new Validatie();
    $_valideren->validate($_POST,[

            "paswoord"=>[
                "hoofdletter"=>1,
                "nummers"=>1,
                "charMin"=>8
            ],
          
            "logon"=>[
                "ad"=>"@"
            ]
        ]);