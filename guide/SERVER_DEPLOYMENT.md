# Contabo VPS Deployment Guide

This guide will help you deploy the **OpenCart Customer Segmentation** project to your fresh Contabo VPS.

## 1. Connect to your VPS
Use the SSH credentials provided by Contabo.
```bash
ssh root@YOUR_VPS_IP
```

## 2. Install Docker & Docker Compose
Run the following command to install the required tools:
```bash
# Update system
apt-get update && apt-get upgrade -y

# Install Docker
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh

# Install Docker Compose
apt-get install -y docker-compose
```

## 3. Setup Project with Git
Instead of unzipping files manually, it is better to use Git for automated updates.

1. **Create a Private Repo** on GitHub and push your local project to it.
2. **Clone** the repo on your VPS:
   ```bash
   git clone https://github.com/YOUR_USERNAME/YOUR_REPO_NAME.git opencart_project
   cd opencart_project
   ```

## 4. Launch the Project
```bash
# Launch the project
docker-compose up -d --build
```

---

## 5. Automated Deployment (GitHub Actions)

This project includes a `.github/workflows/deploy.yml` file. Every time you push to the `main` branch, the VPS will automatically pull the latest code and restart.

### Setup Instructions:
1. **Generate SSH Key on VPS**:
   ```bash
   ssh-keygen -t rsa -b 4096
   cat ~/.ssh/id_rsa.pub >> ~/.ssh/authorized_keys
   ```
2. **Add Secrets to GitHub**:
   Go to your Repo **Settings -> Secrets and variables -> Actions** and add:
   - `SSH_HOST`: Your VPS IP address.
   - `SSH_USER`: `root`
   - `SSH_PRIVATE_KEY`: Copy the content of `~/.ssh/id_rsa` from your VPS.

3. **Deploy**:
   Push your code to GitHub. The "Actions" tab will show the deployment progress.

## 5. Post-Deployment Verification
Once the command finishes, your site will be live:
- **Frontend**: `http://YOUR_VPS_IP/`
- **Admin Backend**: `http://YOUR_VPS_IP/admin/` (Login: `opencart` / `opencart`)
- **phpMyAdmin**: `http://YOUR_VPS_IP:8080/`

---

### Sending Access to Client
To satisfy your client's request, provide them with:
1. **Backend Link**: `http://YOUR_VPS_IP/admin/`
2. **SSH Access**: Tell them they can connect via `ssh root@YOUR_VPS_IP` (You should ideally create a separate user for them or share the temporary credentials after ensuring they are secure).
