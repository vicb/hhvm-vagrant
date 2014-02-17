HHVM Vagrant box
================

Ubuntu Precise box simply installing HHVM (nightly) via apt.

Find mored details on the examples found in the [www](https://github.com/vicb/hhvm-vagrant/tree/master/www) 
folder by reading the associated SitePoint article "HHVM and Hack – Can We Expect Them to Replace PHP?"
[part 1](http://www.sitepoint.com/hhvm-hack-part-1/) and part 2 (to come).


Requirements
------------

* [VirtualBox](https://www.virtualbox.org)
* [Vagrant](http://vagrantup.com)

Installation
------------

```bash
$ git clone https://github.com/vicb/hhvm-vagrant.git
$ cd hhvm-vagrant
$ vagrant up
```

Once the VM is booted you can log via SSH

```bash
$ vagrant ssh
$ ...
```

The server root folder is `/vagrant/www` (on the map) which is the `www` folder
on your host machine.

- The HHVM server is available at `http://localhost:8080` on the host OS
- The HHVM admin server is available at `http://localhost:8100` on the host OS,
  the password is "admin"
- A MySQL server is installed. The root user is "root" with password "pa$$".

HHVM Server Configuration
-------------------------

If you want to tweak the configuration, edit the `conf/config.hdf` and
`conf/php.ini` files.

You can find more information on the `hdf` format:
- On the [HHVM wiki at github](https://github.com/facebook/hhvm/wiki/Runtime-options),
- In the [doc](https://github.com/facebook/hhvm/blob/master/hphp/doc/options.compiled) - warning outdated info.

The access and error log are available in `/var/hhvm`

```bash
$ vagrant ssh
$ tail -f /var/hhvm/access.log
$ tail -f /var/hhvm/error.log
```

Virtual Machine Management
--------------------------

When done just log out with `^D` and suspend the virtual machine

```bash
$ vagrant suspend
```

then, resume to testing again

```bash
$ vagrant resume
```

Run

```bash
$ vagrant halt
```

to shutdown the virtual machine, and

```bash
$ vagrant up
```

to boot it again.

You can find out the state of a virtual machine anytime by invoking

```bash
$ vagrant status
```

Finally, to completely wipe the virtual machine from the disk **destroying all
its contents**:

```bash
$ vagrant destroy
```

Credits
-------

I got some inspiration from:
- https://github.com/adrienbrault/hhvm-vagrant
- https://github.com/javer/hhvm-vagrant-vm
