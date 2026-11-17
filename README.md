# PHP Security Check

A lightweight PHP diagnostic script to quickly verify your server configuration and security status (specifically tailored for hosting environments like world4you).

## 📋 Features

The script checks critical security parameters of your current PHP environment in real time and displays them in a clean dashboard:

* **PHP Version Check:** Detects the currently active PHP version on the server and verifies whether it is up to date and officially supported.
* **Status Indicators (Traffic Light System):** Shows at a glance if your basic configuration is secure (`GREEN`) or requires action.
* **Additional Security Indicators (Mitigations):**
  * `session.upload_progress`: Checks if this feature is enabled (poses a potential security risk if no backport patch is applied by the host).
  * `post_max_size`: Reads the maximum allowed size for POST data and advises keeping it as restrictive as possible to minimize security risks.

## 🚀 Installation & Usage

1. Upload the PHP file (e.g., `security-check.php`) to the root directory of your website via FTP/SFTP.
2. Open the script in your web browser (e.g., `https://`).
3. Review the displayed status indicators and adjust your PHP settings in your hosting control panel if necessary.

## ⚠️ Important Security Notice

**Be sure to delete the script from your server immediately after checking!**

Diagnostic scripts expose internal server and configuration details that could be useful to potential attackers. Never leave this file permanently on a live production server.

## 📄 License

This project is licensed under the MIT License – see the [LICENSE](LICENSE) file for details.
