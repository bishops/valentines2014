valentines2014
==============

The Valentine's Day Matching Application for 2014. 

If you get stuck or want help: __Please Email Me! anglinb@bishops.com__
###Getting Started


    
  - [install vagrant](http://www.vagrantup.com/) or [more detail](http://briananglin.me/2013/11/lets-install-vagrant/)
  - install git/github [windows](http://windows.github.com/) or [mac part 1](http://mac.github.com/) [mac part 2](https://github.com/blog/1510-installing-git-from-github-for-mac) (you need command line tools)
  - Open up the git command line (Git Shell for windows) (Terminal for mac)
  - clone the puppet-lamp-stack repo `git clone http://github.com/anglinb/puppet-lamp-stack vm`
  - run `cd vm`
  - run `git clone http://github.com/bishops/valentines2014 valentines`
  - run `vagrant box add http://files.vagrantup.com/precise32.box`
  - run `vagrant up`
  - ssh into box `vagrant ssh` or [Putty](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html) on windows pw = `vagrant` un = `vagrant` port = `2222` address = `127.0.0.1`
  - run `cd /vagrant`
  - run `sudo php chvhost.php "valentines/public"`
  - run `curl -sS https://getcomposer.org/installer | php` only run first time
  - run `mv composer.phar /usr/local/bin/composer` only run first time
  - run `cd valentines`
  - run `composer install`
  - Open webbrowser to `http://localhost:8888`

###Learning how to contribute

  - Learn the basics of git from the command line from [codeschool](https://www.codeschool.com/courses/try-git)
  - Learn the basics of [Laravel Framework](http://laravel.com/docs/quick#routing)
  - Possibly start with a [view located in the views folder](https://github.com/bishops/valentines2014/tree/master/app/views)
  - Once you're ready to commit:
    - Run `git pull` This makes sure you have the latest copy of the repo
    - Change the file
    - Optional: run `git status` This tells you what files have changed etc
    - Run `git add .` This add all the files you've changed to the staging area
    - Run `git commit -m "YOUR MESSAGE"` Replace YOUR MESSAGE with some the says what you did ex `Adds question view`
    - Run `git push` This pushes your code up to github.com so everyone else can pull it down
    - Win
