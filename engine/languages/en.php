<?php
return (object) array(
    'name' => 'English',
    'strings' => (object) array(
        'header' => (object) array (
            'help' => 'Help',
            'contact' => 'Contact',
            'deliveryinfo' => 'Delivery Information',
            'callus' => 'Call us: :phonenumber:',
            'register' => 'Register',
            'search' => 'Search...'
        ),
        'login' => (object) array(
            'login' => 'Login',
            'signin' => 'Sign in',
            'email' => 'Email address',
            'password' => 'Password',
            'remember' => 'Remember me',
            'forgot' => 'Forgot your password?'
        ),
        'register' => (object) array(
            'title' => 'Not a customer yet?',
            'first_name' => 'First name',
            'insertion' => 'Insertion',
            'last_name' => 'Last name',
            'email' => 'Email address',
            'gender_m' => 'Male',
            'gender_v' => 'Female',
            'gender_un' => 'Unspecified',
            'password' => 'Password',
            'password_r' => 'Repeat password',
            'terms' => 'I agree to :name: <a class="terms" href="#"> terms of service</a>.',
            'button' => 'Create an account',
            'login' => (object) array(
                'title' => 'Already a customer?',
                'email' => 'Email',
                'password' => 'Password',
                'signin' => 'Sign in',
                'forgotpass' => 'Forgot your password?'
            ),
            'messages' => (object) array(
                'passwords' => 'The passwords you filled in are not the same.',
                'exists' => 'An account with this email address already exists? Do you want to log in on the right?',
                'terms' => "You didn't accept the therms of service.",
                'success' => "Your account has been created."
            ),
            'emails' => (object) array(
                'subject' => 'Account created.',
                'msg' => '<html><body>
                                Hello :name:,
                                <br/><br/>
                                Your account on our webshop PC4U has been created. We hope that you find the things you are looking for.
                                <br/><br/>
                                Kind regards,<br/>
                                PC4U
                          </body></html>'
            )
        ),
        'cart' => (object) array(
            'items' => 'items',
            'checkout' => 'Checkout',
            'empty' => 'Empty cart'
        ),
        'navbar' => (object) array(
            'home' => 'Home'
        ),
        'welcome' => 'Welcome to PC4U',
        'footer' => (object) array(
            'newsletter' => (object) array(
                'placeholder' => 'Enter your email to join our newsletter',
                'join' => 'Join'
            ),
            'care' => (object) array(
                'title' => 'Customer Care',
                'help' => 'Help center',
                'FAQ' => 'FAQ',
                'payment' => 'Payments',
                'delivery' => 'Delivery'
            ),
            'about' => (object) array(
                'title' => 'About us',
                'history' => 'Our history',
                'career' => 'Career'
            ),
            'account' => (object) array(
                'title' => 'My account',
                'register' => 'Register',
                'login' => 'Login',
                'cart' => 'My cart',
                'history' => 'Payment history'
            ),
            'info' => 'Information',
            'template' => 'Template by R.Schepers'
        )
    )
);