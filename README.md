# SYMFONY SECURITY COMPONENT 101
________________________________
This project is based on the tutorial of [WouterJ](http://wouterj.nl/2019/03/understanding-symfony-security-by-using-it-standalone)

## Requirements
Using docker
- docker >= 19.03.0
- docker-compose
- make command

Standalone installation
- PHP >= 7.4
- composer
- 
## Installation
run `make up`

Enjoy!

## Useful Notes
- Security consists of two main steps: Authentication and Authorization.
- **Authentication**: is when the app asks: Who are you? At first visit to a site, this is usually a login form 
or a request to a login action. After that the request uses a session stored after login or an API token for API calls.
- **Authorization**: is the question: Are you allowed to do this? This is when the user tries to visit a resource or 
to make an action. So we trie to found out if the user is allowed to perform the action he wants to do.