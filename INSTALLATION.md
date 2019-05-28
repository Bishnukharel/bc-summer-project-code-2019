# Dev Tools Installation

## INSTALL DOCKER FOR WINDOWS

- Install Docker Desktop for Windows. You'll need a Docker Hub accout for this.
   - https://hub.docker.com/editions/community/docker-ce-desktop-windows
   - Run the installation exe as administrator!
- To enable WSL remote connect to Docker for Windows:
   - Start Docker for Win by running the application as the administrator.
   - Open Settings > General > Check "Expose daemon..."
- Share C volume with Docker
   - Open Settings > Shared Drives > Check "Share C"
- Set a fixed DNS server
   - Open Settings > Network > Fixed 8.8.8.8

## SETUP DEBIAN WSL TO SYNC FILES

Inside Debian run:

```
sudo nano /etc/wsl.conf
```

This opens the nano text editor. Copy and paste the following content into the text editor view.

```
#Let's enable extra metadata options by default
[automount]
enabled = true
root = /
options = "metadata,umask=22,fmask=11"
mountFsTab = false

#Let's enable DNS – even though these are turned on by default, we'll specify here just to be explicit.
[network]
generateHosts = true
generateResolvConf = true
```

Save this content by typing "ctrl + X" (meaning exit and save). Answer "y" for the prompt of writing the file and hit enter to use the same filename (/etc/wsl.conf).

## INSTALL DOCKER CE INSIDE DEBIAN
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

# You should see something like this:
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

Open the following link to the installation guide and select the "Linux" tab. Follow the instructions.

https://help.github.com/en/articles/generating-a-new-ssh-key-and-adding-it-to-the-ssh-agent

## Install the exercise project

First clone the project repository. You will use this as a reference to read the assignments and solutions. Each assignment and solution is in its own git branch.
```
mkdir -p /c/projects
cd /c/projects
git clone git@github.com:villesiltala/bc-summer-project-code-2019.git
```

Then clone it again into another directory and remove git from it. This will be your project folder where you can do the exercises.

```
cd /c/projects
git clone git@github.com:villesiltala/bc-summer-project-code-2019.git mysummerproject
rm -rf /c/projects/mysummerproject/.git
```
_The name does not have to be "mysummerproject". You can name it whatever you feel like._

Open a new debian WSL window and close the current.

```
cd /c/dev/mysummerproject
```

Allow autoenv to do its magic.

Start the project:

```
docker-compose up -d
```
or

```
make docker-start
```
