# 🚨 Exp07 — DVWA: Web Security Vulnerability Analysis

> **Repository:** `Exp07-DVWA-WebSecurity`
> **Short description:** Hands‑on proofs-of‑concept, evidence, and remediation for common web vulnerabilities using **Damn Vulnerable Web Application (DVWA)** in an isolated VM environment.

---

![shield-badges](https://img.shields.io/badge/Environment-VM%20\(LAMP\)-blue) ![shield-badges2](https://img.shields.io/badge/Security-Educational-orange) ![shield-badges3](https://img.shields.io/badge/Status-Complete-green)

## ✨ Why this repo

This repo documents a lab exercise (Experiment No.7) where DVWA was deployed in a controlled virtual machine, exploited to reveal vulnerabilities, and then hardened. It's built for learning — clear evidence, repeatable PoCs, and practical remediation snippets make it ideal for students and instructors.

---

## 📚 Table of Contents

1. [Project Highlights](#-project-highlights)
2. [Repository Structure](#-repository-structure)
3. [Quickstart — Reproduce the Lab](#-quickstart---reproduce-the-lab)
4. [Key Vulnerabilities & Remediations](#-key-vulnerabilities--remediations)
5. [How to Explore the Exploits](#-how-to-explore-the-exploits)
6. [Deliverables (What to Submit)](#-deliverables-what-to-submit)
7. [Screenshots & Evidence](#-screenshots--evidence)
8. [Contributing & Notes](#-contributing--notes)
9. [Disclaimer & License](#-disclaimer--license)

---

## 🚀 Project Highlights

* Complete DVWA LAMP setup commands (documented and masked for privacy).
* PoC exploits for: **SQLi, Reflected & Stored XSS, CSRF, IDOR, File Upload, Command Injection, LFI/RFI**.
* Remediation code snippets (prepared statements, output encoding, CSRF tokens, upload hardening).
* Evidence: labelled screenshots and terminal transcripts for reproducibility.
* Optional demo videos (2–4 min) for two chosen vulnerabilities.

---

## 🗂 Repository Structure

```
/report/            # Final PDF report (Executive summary, full findings, CVSS-like ratings)
/evidence/          # Labeled screenshots and terminal transcripts
/exploits/          # PoC payloads, scripts, CSRF HTML, safe web-shell examples (archived)
/config/            # DVWA config changes (config.inc.php) with masked credentials
/patches/           # Fixes & pseudo-fixes (PHP snippets, prepared statements, token helpers)
/notes/             # Setup notes, checklist, and step-by-step commands
/videos/            # Optional demonstration videos
README.md           # This file
```

---

## ⚡ Quickstart — Reproduce the Lab (summary)

> Full step-by-step is in `/notes/setup.md`. Use an isolated VM for safety.

```bash
# Install LAMP + extras
sudo apt update
sudo apt install -y apache2 mariadb-server php php-mysqli php-xml php-gd php-mbstring git unzip
sudo systemctl enable --now apache2 mariadb
sudo mysql_secure_installation

# Install DVWA
cd /tmp
git clone https://github.com/digininja/DVWA.git
sudo mv DVWA /var/www/html/dvwa
sudo chown -R www-data:www-data /var/www/html/dvwa
sudo chmod -R 755 /var/www/html/dvwa
cd /var/www/html/dvwa/config
sudo cp config.inc.php.dist config.inc.php
# Edit DB creds, create DB and user, then visit http://<vm-ip>/dvwa/setup.php
```

---

## 🔬 Key Vulnerabilities & Example Remediations

* **SQL Injection (SQLi)** — *PoC:* `exploits/sqli/`
  *Fix:* Prepared statements / parameterized queries + least-privilege DB account.

* **Reflected & Stored XSS** — *PoC:* `exploits/xss_r/`, `exploits/xss_s/`
  *Fix:* Context-aware output encoding (HTML entity encoding), Content Security Policy (CSP).

* **CSRF** — *PoC:* `exploits/csrf/`
  *Fix:* Per-request anti-CSRF tokens, SameSite cookies.

* **IDOR** — *PoC:* `exploits/idor/`
  *Fix:* Server-side authorization checks; use opaque identifiers.

* **File Uploads** — *PoC:* `exploits/upload/`
  *Fix:* Whitelisting, MIME + content validation, store outside webroot, rename files.

* **Command Injection / LFI / RFI** — *PoC:* `exploits/exec/`, `exploits/fi/`
  *Fix:* Avoid shelling out, strict input validation, path canonicalization.

Detailed code examples are stored in `/patches/` and explained in the final `/report/`.

---

## 🧭 How to Explore the Exploits

1. Read the high-level description in `/exploits/README.md` for each vulnerability.
2. Reproduce PoC payloads inside an isolated VM running the supplied DVWA installation.
3. Capture screenshots and terminal transcripts; compare with `/evidence/` as reference.

---

## 📦 Deliverables (for submission)

* `/report/Experiment07_Report.pdf` — full report with executive summary, per-vuln evidence and CVSS-like risk ratings.
* `/evidence/` — labeled screenshots and terminal transcripts.
* Git repo with code, PoCs, and optional short videos (2–4 mins) for selected vulnerabilities.

---

## 📸 Screenshots & Evidence

All screenshots in `/evidence/` are labeled by vulnerability and step number. Sensitive information (IP addresses, real passwords) is masked. If you add evidence, follow the existing naming convention: `vuln-step-description.png`.

---

## 🤝 Contributing

Want to extend experiments or add hardened patches? Fork, add, and create a PR. Please include: description, affected files, and new evidence.

---

## ⚠️ Disclaimer

This repository is strictly for educational use in an isolated, permissioned environment. Do **not** use these PoCs against systems you do not own or have explicit permission to test.

---

## 📝 License

Use for academic/educational purposes only. For institution use, follow your college's policy. If you want a formal license file, I can add an `LICENSE` (MIT/CC-BY-NC) on request.

---

*Prepared by Sujal Dingankar for Sardar Patel Institute of Technology — Experiment No.7: Web Security.*
