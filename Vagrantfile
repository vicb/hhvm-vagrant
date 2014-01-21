# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise64"
  config.vm.box_url = "http://files.vagrantup.com/precise64.box"

  config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.network :forwarded_port, guest: 8080, host: 8081
  config.vm.network :private_network, ip: "192.168.66.66"

  config.vm.provider :virtualbox do |vb|
    vb.name = "HHVM"
    vb.customize ["modifyvm", :id, "--memory", "2048"]
    vb.customize ["modifyvm", :id, "--ostype", "Ubuntu_64"]
  end

  config.vm.provision "shell", inline: <<-shell
    echo "deb http://dl.hhvm.com/ubuntu precise main" > /etc/apt/sources.list.d/hhvm.list
    apt-get update
    apt-get install hhvm-nightly -y --force-yes

    sudo chown vagrant /etc/hhvm
    sudo cp /vagrant/conf/config.hdf /etc/hhvm/config.hdf
    sudo cp /vagrant/conf/php.ini /etc/hhvm/php.ini

    echo "Creating /var/hhvm/error.log"
    sudo mkdir /var/hhvm
    sudo touch /var/hhvm/error.log
    sudo chown vagrant /var/hhvm/error.log

    hhvm -m daemon -c /etc/hhvm/config.hdf
  shell
end
