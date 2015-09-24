<?php
return (object) array(
    'name' => 'Dutch',
    'strings' => (object) array(
        'header' => (object) array (
            'help' => 'Help',
            'contact' => 'Contact',
            'deliveryinfo' => 'Bezorg informatie',
            'callus' => 'Bel ons: :phonenumber:',
            'register' => 'Registeren',
            'search' => 'Zoeken...',
        ),
        'login' => (object) array(
            'login' => 'Log in',
            'signin' => 'Inloggen',
            'email' => 'E-mail adres',
            'password' => 'Wachtwoord',
            'remember' => 'Onthoud gegevens',
            'forgot' => 'Wachtwoord vergeten'
        ),
        'register' => (object) array(
            'title' => 'Nog geen klant?',
            'first_name' => 'Voornaam',
            'insertion' => 'Tussenvoegsel',
            'last_name' => 'Achternaam',
            'date' => 'dd-mm-yyyy',
            'email' => 'Email adres',
            'gender_m' => 'Man',
            'gender_v' => 'Vrouw',
            'gender_un' => 'Ongespecificeerd',
            'password' => 'Wachtwoord',
            'password_r' => 'Herhaal wachtwoord',
            'newsletter' => 'Ik wil me aanmelden voor de nieuwsbrief.',
            'terms' => 'Ik ga akkoord met :name: <a class="terms" href="#"> algemene voorwaarden</a>.',
            'button' => 'Maak account',
            'login' => (object) array(
                'title' => 'Al klant?',
                'email' => 'Email',
                'password' => 'Wachtwoord',
                'signin' => 'Login',
                'forgotpass' => 'Wachtwoord vergeten?',
                'messages' => (object) array(
                    'error' => 'Er is geen account gevonden met deze gegevens.',
                    'success' => 'Je bent succesvol ingelogd. Je word doorgestuurd naar de home pagina.'
                )
            ),
            'messages' => (object) array(
                'passwords' => 'De wachtwoorden die je hebt ingevuld zijn niet gelijk aan elkaar',
                'exists' => 'Een account met dit email adres bestaat al, wil je hier rechts inloggen?',
                'terms' => "Je bent niet akkoord gegaan met de algemene voorwaarden",
                'success' => "Je account is aangemaakt en we hebben je een welkoms mail gestuurd."
            ),
            'emails' => (object) array(
                'subject' => 'Account aangemaakt.',
                'msg' => '<html><body>
                                Hallo :name:,
                                <br/><br/>
                                Je account voor onze webshop PC4U is aangemaakt. We hopen dat je de producten vindt waar je naar op zoek bent.
                                <br/><br/>
                                Met vriendelijke groeten,<br/>
                                PC4U
                          </body></html>'
            )
        ),
        'account' => (object) array(
            'button' => 'Mijn account'
        ),
        'cart' => (object) array(
            'items' => 'producten',
            'checkout' => 'Bestellen',
            'empty' => 'Geen producten'
        ),
        'navbar' => (object) array(
            'home' => 'Home'
        ),
        'welcome' => 'Welkom bij PC4U',
        'footer' => (object) array(
            'newsletter' => (object) array(
                'placeholder' => 'Vul uw email in om onze nieuwsbrief te volgen',
                'join' => 'Volg'
            ),
            'care' => (object) array(
                'title' => 'Klantenservice',
                'help' => 'Help centrum',
                'FAQ' => 'FAQ',
                'payment' => 'Betalen',
                'delivery' => 'Bezorging'
            ),
            'about' => (object) array(
                'title' => 'Over ons',
                'history' => 'Geschiedenis',
                'career' => 'Vacatures'
            ),
            'account' => (object) array(
                'title' => 'Mijn Account',
                'register' => 'Registeren',
                'login' => 'Login',
                'cart' => 'Mijn winkelwagen',
                'history' => 'Bestel geschiendenis'
            ),
            'info' => 'Informatie',
            'template' => 'Template door R.Schepers'
        )
    )
);