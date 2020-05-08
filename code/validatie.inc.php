<?php
//aanmaken van new validatie object
        $_valideren=new Validatie();
    $_valideren->validate($_POST,[

            "aanpreek"=>[],
            "naam"=>[
                "charMax"=>45,
                "charMin"=>2  
            ],
            "voornaam"=>[
                "charMax"=>45,
                "charMin"=>2 
            ],
            "gender"=>[],
            "straat"=>[
                "charMax"=>50,
                "charMin"=>4  
            ],
            "postcode"=>[],
            "gemeente"=>[],
            "tel"=>[
                "charMax"=>10,
                "charMin"=>10
            ],
            "paswoord"=>[
                "hoofdletter"=>1,
                "nummers"=>1,
                "charMin"=>8


            ],
            "her_paswoord"=>[
                "vergelijk"=>"paswoord"
            ],
            "mail"=>[
                "ad"=>"@"
            ],
            "nr"=>[],
        "geboortedatum"=>[]
        ]);