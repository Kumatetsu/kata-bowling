# kata-php-skeleton

kata-php-skeleton is a template for kata in php.

unit tests are ready for tdd !

# how to use it
1. [Init your github repository](https://github.com/new)

2. clone the project
```
git clone git@github.com:Kumatetsu/kata-php-skeleton.git {your-repo-name}
cd {your-repo-name}
```

3. init your github project with the skeleton 
```
GITHUB_USER={your-github-name} make init-repository //push the first commit to your repo
```

4. launch the dockers
```
make docker-build
make docker-run
```

5. launch tests
```
make docker-tests
```

# utils
- stop the container (and delete it):
```
make docker-stop
```
- ssh to the docker
```
make docker-ssh
```
