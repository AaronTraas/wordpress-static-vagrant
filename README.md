# Wordpress Static Site - Proof-of-Concept

This contains the Vagrant/Ansible provisioning for a 2-server solution for 
Wordpress hosting. The duties of the servers are as follows:

- **app-server**: LAMP server running Wordpress. This would be, in theory, 
  "secret", i.e., hidden from the world using an obscure domain and HTTP-auth 
  password. This is where any site content editors would log in and add/edit
  site content. 
- **web-server**: nginx server serving up static assets. This contains a static
  version of the site on app-server, but doesn't actually run wordpress. Unlike
  the *app-server*, this is to be public facing.

The *app-server* uses a plugin to render the entire site as static HTML/JS/CSS,
and upload to the *web-server*, which then simply serves the static content. 

The web-server could be improved by adding a cacheing proxy like Varnish, 
keeping all its assets in RAM and thus serving content very quickly, making the
site hard to DDoS. 

## Install dependencies on your Mac

1. install [Xcode from the Mac App Store](https://developer.apple.com/xcode/download/)
2. launch Xcode
3. accept license agreement

Once Xcode is installed, you need to then install the Xcode command-line tools.
In the terminal, type:

```
xcode-select --install
```

This will prompt you to install the Xcode command-line tools. Follow the
prompts.

Once the command-line tools are properly installed, enter the following in the
terminal (it will prompt you for your password one or more times):

```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
brew tap caskroom/cask && brew install brew-cask
brew install ansible caskroom/cask/vagrant caskroom/cask/virtualbox
```

Then change the directory to the directory containing this file, and type:

```
vagrant up
```

In the terminal. This will create 2 VMs, one for each role. 

## Sites:

### app-server:
- *URL:* http://10.99.0.2/wp-admin/
- *user:* admin
- *password:* password

### app-server:
- *URL:* http://10.99.0.3/
- *user:* admin
- *password:* password