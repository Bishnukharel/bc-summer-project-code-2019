# Dev Tools Installation

## INSTALL DOCKER CE
Based on:
- https://docs.docker.com/install/linux/docker-ce/debian/
- https://nickjanetakis.com/blog/setting-up-docker-for-windows-and-wsl-to-work-flawlessly#install-docker-compose

```
# Update the apt package index:
sudo apt-get update

# Install packages to allow apt to use a repository over HTTPS:
sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg2 \
    software-properties-common

# Add Docker’s official GPG key:
curl -fsSL https://download.docker.com/linux/debian/gpg | sudo apt-key add -

# Verify that you now have the key with the fingerprint:
sudo apt-key fingerprint 0EBFCD88

# You should see:
# pub   4096R/0EBFCD88 2017-02-22
#      Key fingerprint = 9DC8 5822 9FC7 DD38 854A  E2D8 8D81 803C 0EBF CD88
# uid                  Docker Release (CE deb) <docker@docker.com>
# sub   4096R/F273FCD8 2017-02-22

# Use the following command to set up the stable repository.
sudo add-apt-repository \
   "deb [arch=amd64] https://download.docker.com/linux/debian \
   $(lsb_release -cs) \
   stable"

# Update the apt package index.
sudo apt-get update

# Install the latest version of Docker CE and containerd:
sudo apt-get install docker-ce docker-ce-cli containerd.io

# Configure WSL to Connect to Docker for Windows

# Connect to the remote Docker for Windows daemon with this 1 liner:
echo "export DOCKER_HOST=tcp://localhost:2375" >> ~/.bashrc && source ~/.bashrc

# Verify everything works.
# You should get a bunch of output about your Docker daemon.
# If you get a permission denied error, close + open your terminal and try again.
docker info
```

## INSTALL DOCKER COMPOSE

```
# Install Python and PIP.
sudo apt-get install -y python

# Install Docker Compose.
# Use the WSL user password for the prompt.
sudo curl -L "https://github.com/docker/compose/releases/download/1.24.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose

# Modify access rights to enbale execution.
sudo chmod +x /usr/local/bin/docker-compose

# Verify installation. You should get back your Docker Compose version.
docker-compose --version
```

## INSTALL NODE

```
# Now add the package repository of NodeJS 8.x with the following command:
curl -sL https://deb.nodesource.com/setup_8.x | sudo -E bash -

# Install nodejs:
sudo apt-get install -y nodejs

# Verify:
node -v
npm -v
```

## INSTALL AUTOENV

```
git clone git://github.com/kennethreitz/autoenv.git ~/.autoenv
echo 'source ~/.autoenv/activate.sh' >> ~/.bashrc
```

## Setup SSH key for GitHub

https://help.github.com/en/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent

## Install the exercise project

```
cd /c/dev/
git clone git@github.com:villesiltala/bc-summer-project-code-2019.git

# Open a new debian WSL window and close the current.

cd /c/dev/project-path

# Allow autoenv to do its magic.

# Start the project

docker-compose up -d
```