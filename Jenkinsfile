pipeline {
     agent { label 'master' }
     stages {
          stage('Source') {
               steps {
                    git branch: 'main',
                        url: 'https://github.com/testOrgWebTech/prototype-project-back'
               }
          }
          stage('Set') {
              steps {
                    bat 'docker run --rm -v "%cd%":/app composer install --ignore-platform-reqs'
              }
          }
          stage('Build') {
               steps {
                    bat 'docker-compose up -d'
               }
          }
          stage('Test') {
              steps {
                    bat 'docker exec prototype-project-back_php_1 php artisan test --testsuite=Feature'
              }
          }
          stage('End') {
              steps {
                    bat 'docker-compose down'
              }
          }
     }
}
