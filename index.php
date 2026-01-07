<?php
session_start();
require_once 'settings.php';

// Check if user is logged in
$userLogged = isset($_SESSION['user_logged']) ? $_SESSION['user_logged'] : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RavenWeb - Card Checker</title>
    
    <!-- UIKit CSS -->
    <link rel="stylesheet" href="css/uikit.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/hyper.css">
</head>
<body>

<?php include 'header.php'; ?>

<div class="uk-section">
    <div class="uk-container">
        <div class="uk-text-center">
            <h1 class="uk-heading-medium">Welcome to RavenWeb</h1>
            <p class="uk-text-lead">Multi-Gateway Card Checker</p>
        </div>

        <div class="uk-margin-large-top">
            <div class="uk-grid-match uk-child-width-1-3@m uk-grid-small" data-uk-grid>
                
                <!-- Braintree Gateway -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-hover">
                        <h3 class="uk-card-title">Braintree</h3>
                        <p>Check cards using Braintree payment gateway</p>
                        <a href="braintree/" class="uk-button uk-button-primary uk-width-1-1">Check Now</a>
                    </div>
                </div>

                <!-- Braintree Shopify Gateway -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-hover">
                        <h3 class="uk-card-title">Braintree Shopify</h3>
                        <p>Check cards using Braintree Shopify gateway</p>
                        <a href="braintreeshopyify/" class="uk-button uk-button-primary uk-width-1-1">Check Now</a>
                    </div>
                </div>

                <!-- Google Gateway -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-hover">
                        <h3 class="uk-card-title">Google Pay</h3>
                        <p>Check cards using Google Pay gateway</p>
                        <a href="google/" class="uk-button uk-button-primary uk-width-1-1">Check Now</a>
                    </div>
                </div>

                <!-- Square Gateway -->
                <div>
                    <div class="uk-card uk-card-default uk-card-body uk-card-hover">
                        <h3 class="uk-card-title">Square</h3>
                        <p>Check cards using Square payment gateway</p>
                        <a href="square/" class="uk-button uk-button-primary uk-width-1-1">Check Now</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="uk-margin-large-top uk-text-center">
            <h2>Features</h2>
            <div class="uk-grid-match uk-child-width-1-3@m uk-margin-top" data-uk-grid>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <span data-uk-icon="icon: check; ratio: 2"></span>
                        <h4>Fast Checking</h4>
                        <p>Quick and efficient card validation</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <span data-uk-icon="icon: lock; ratio: 2"></span>
                        <h4>Secure</h4>
                        <p>Your data is protected and encrypted</p>
                    </div>
                </div>
                <div>
                    <div class="uk-card uk-card-default uk-card-body">
                        <span data-uk-icon="icon: world; ratio: 2"></span>
                        <h4>Multiple Gateways</h4>
                        <p>Support for various payment processors</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Scripts -->
<script src="js/jquery.js"></script>
<script src="js/uikit.js"></script>
<script src="js/hyper.js"></script>

</body>
</html>
