Vagrant.require_version ">= 1.8"

VM_NAME_APP = "Wordpress-Static -- App Server"
IP_ADDRESS_APP = "10.99.0.2"

VM_NAME_WEB = "Wordpress-Static -- Web Server"
IP_ADDRESS_WEB = "10.99.0.3"

Vagrant.configure("2") do |config|

    config.vm.box = "ubuntu/xenial64"
    config.ssh.forward_agent = true

    # First VM -- app server that hosts Wordpress on LAMP. 
    config.vm.define "wordpress-static-app" do |app|
        app.vm.provider :virtualbox do |v|
            v.name = VM_NAME_APP
            v.customize [
                "modifyvm", :id,
                "--name", VM_NAME_APP,
                "--memory", 512,
                "--natdnshostresolver1", "on",
                "--cpus", 1,
                "--usbehci", "off"
            ]
        end

        app.vm.network :private_network, ip: IP_ADDRESS_APP

        # Ansible provisioning (you need to have ansible installed)
        app.vm.provision "ansible" do |ansible|
            ansible.playbook = "ansible/provision_app.yml"
            ansible.extra_vars = {
                vagrant_local_hostname:   "localhost",
                servername:               "wordpress-static-app",
                remote_path:              "/vagrant/",
                doc_root:                 "/vagrant/src/public_html",
                mysql_hostname:           "localhost",
                mysql_database:           "wordpress",
                mysql_user:               "wordpress",
                mysql_root_password:      "mysqlrootpassword",
                mysql_password:           "mysqlpassword",
                mysql_backup_filename:    "wordpress.sql",
                base_url:                 "http://" + IP_ADDRESS_APP,
                auth_type:                "none"
            }
        end

         app.vm.synced_folder "./", "/vagrant", mount_options: ["dmode=777,fmode=666"]
    end
    
    # Second VM -- web server hosting static files via nginx
    config.vm.define "wordpress-static-web" do |web|
        web.vm.provider :virtualbox do |v|
            v.name = VM_NAME_WEB
            v.customize [
                "modifyvm", :id,
                "--name", VM_NAME_WEB,
                "--memory", 256,
                "--natdnshostresolver1", "on",
                "--cpus", 1,
                "--usbehci", "off"
            ]
        end

        web.vm.network :private_network, ip: IP_ADDRESS_WEB

        # Ansible provisioning (you need to have ansible installed)
        web.vm.provision "ansible" do |ansible|
            ansible.playbook = "ansible/provision_web.yml"
            ansible.extra_vars = {
                vagrant_local_hostname:   "localhost",
                base_url:                 "http://" + IP_ADDRESS_WEB,
            }
        end
    end

end
