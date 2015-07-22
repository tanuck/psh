Vagrant.configure(2) do |config|

  config.vm.box = "tanuck/ubucake"

  config.vm.network "private_network", ip: "192.168.33.25"

  config.vm.provider "virtualbox" do |vb|
    vb.memory = "1024"
  end
end
