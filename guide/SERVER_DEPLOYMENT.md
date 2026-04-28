# Contabo VPS Deployment Guide

This guide will help you deploy the **OpenCart Customer Segmentation** project to your fresh Contabo VPS.

## 1. Connect to your VPS
Use the SSH credentials provided by Contabo.
```bash
ssh root@YOUR_VPS_IP
```

## 2. Create a Restricted Deployment User
For security, it is better to avoid using the `root` user for daily tasks. We will create a dedicated user restricted to `/var/www/projects`.

```bash
# Create the projects directory
mkdir -p /var/www/projects

# Create a new user (e.g., 'deployer')
adduser deployer

# Set the home directory to the projects folder
usermod -d /var/www/projects deployer

# Give ownership of the projects folder to the user
chown -R deployer:deployer /var/www/projects

# Add the user to the docker group so they can run containers
usermod -aG docker deployer
```

## 3. Install Docker & Docker Compose
Run the following command to install the required tools:
```bash
# Update system
apt-get update && apt-get upgrade -y

# Install Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh

# Install Docker Compose (Ensuring modern version)
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
```

## 4. Setup Project with Git
Switch to your new user before cloning the project:

```bash
# Switch to the deployer user
su - deployer

# Navigate to the projects directory
cd /var/www/projects

# Clone the repo
git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git opencart-farhan
cd opencart-farhan
```

## 5. Fix Permissions & Initialize Database
This step is mandatory for the first deployment.

```bash
# 1. Give the web server write access
chmod -R 777 upload/system/storage upload/image
chmod 0777 upload/config.php upload/admin/config.php

# 2. Fix the SQL syntax and invalid dates
sed -i 's/^-----------------------------------------------------------/-- -----------------------------------------------------------/g' upload/install/opencart.sql
sed -i "s/'0000-00-00'/'2000-01-01'/g" upload/install/opencart.sql
sed -i "s/'0000-00-00 00:00:00'/'2000-01-01 00:00:00'/g" upload/install/opencart.sql

# 3. Import the database schema (after containers are running)
# Run step 6 first, then run this command:
docker-compose exec -T db mysql -uroot -popencart opencart < upload/install/opencart.sql
```

## 6. Launch the Project
```bash
docker-compose up -d --build
```

---

## 6. Automated Deployment (GitHub Actions)

This project includes a `.github/workflows/deploy.yml` file. Every time you push to the `main` branch, the VPS will automatically pull the latest code and restart.

### Setup Instructions:
1. **Generate SSH Key for 'deployer'**:
   ```bash
   # Switch to deployer user if not already
   su - deployer
   
   ssh-keygen -t rsa -b 4096
   cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
   ```
2. **Add Secrets to GitHub**:
   Go to your Repo **Settings -> Secrets and variables -> Actions** and add:
   - `SSH_HOST`: Your VPS IP address.
   - `SSH_USER`: `deployer`
   - `SSH_PRIVATE_KEY`: Copy the content of `~/.ssh/id_rsa` (from the `deployer` user's home).

3. **Deploy**:
   Push your code to GitHub. The "Actions" tab will show the deployment progress.

## 7. Post-Deployment Verification
Once the command finishes, your site will be live:
- **Frontend**: `http://YOUR_VPS_IP/`
- **Admin Backend**: `http://YOUR_VPS_IP/admin/` (Login: `opencart` / `opencart`)
- **phpMyAdmin**: `http://YOUR_VPS_IP:8080/`

---

### Sending Access to Client
To satisfy your client's request, provide them with:
1. **Backend Link**: `http://YOUR_VPS_IP/admin/`
2. **SSH Access**: Provide the `deployer` credentials. They will only have access to `/var/www/projects`.
    - **Command**: `ssh deployer@YOUR_VPS_IP`
