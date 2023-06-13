<?php

use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\PasswordHasher\Hasher\PasswordHasherFactory;
use Symfony\Component\PasswordHasher\Hasher\PlaintextPasswordHasher;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\InMemoryUserProvider;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticatorManager;
use Symfony\Component\Security\Http\Authenticator\HttpBasicAuthenticator;

require_once 'vendor/autoload.php';

$passwordHasherFactory = new PasswordHasherFactory([
    UserInterface::class => new PlaintextPasswordHasher(),
]);
$passwordHasher = $passwordHasherFactory->getPasswordHasher(UserInterface::class);

$userProvider = new InMemoryUserProvider([
    'abdou' => [
        // Hash the plain password
        'password' => $passwordHasher->hash('pa$$w0rd'),
        'roles' => ['ROLE_ADMIN'],
    ]
]);

$user = $userProvider->loadUserByIdentifier('abdou');

$passwordHasher->verify($user->getPassword(), 'pa$$w0rd');

$token = new UsernamePasswordToken($user, 'main');

$tokenStorage = new TokenStorage();
$tokenStorage->setToken($token);

$eventDispatcher = new EventDispatcher();

$authenticationManager = new AuthenticatorManager(
    [
        new HttpBasicAuthenticator(
            'test',
            $userProvider
        )
    ],
    $tokenStorage,
    $eventDispatcher,
    'main'
);