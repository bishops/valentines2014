valentines2014
==============

The Valentine's Day Matching Application for 2014. 

###Getting Started


    
  - [install vagrant](http://www.vagrantup.com/) or [more detail](http://briananglin.me/2013/11/lets-install-vagrant/)
  - clone the puppet-lamp-stack repo `git clone http://github.com/anglinb/puppet-lamp-stack vm`
  - run `cd vm`
  - run `vagrant box add http://files.vagrantup.com/precise32.box`
  - run `vagrant up`
  - ssh into box `vagrant ssh` or [Putty](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html) on windows pw = `vagrant` un = `vagrant` port = `2222` address = `127.0.0.1`
  - run `cd /vagrant`
  - run `sudo php chvhost.php "valentines/public"`
  - Open webbrowser to `http://localhost:8888`
