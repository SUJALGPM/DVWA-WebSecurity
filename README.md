# Experiment 07: Web Security Vulnerability Analysis

This repository contains the proof-of-concept exploits, evidence, and final report for an experiment on identifying, exploiting, and mitigating common web application vulnerabilities using the Damn Vulnerable Web Application (DVWA).

## Project Structure

- **/report**: Contains the final PDF report summarizing the experiment's findings.
- **/evidence**: Contains all the screenshots gathered as evidence for each vulnerability and mitigation step.
- **/exploits**: Contains the code snippets and payloads used to successfully exploit the vulnerabilities in DVWA's low-security setting.

## Summary of Findings

This experiment successfully demonstrated the exploitation of several critical vulnerabilities, including:
- SQL Injection (SQLi)
- Cross-Site Scripting (Reflected & Stored)
- Cross-Site Request Forgery (CSRF)
- Insecure Direct Object References (IDOR)
- Malicious File Uploads
- Command Injection
- Local File Inclusion (LFI)

The remediation process involved leveraging DVWA's high-security settings, which implement modern defense mechanisms such as prepared statements, context-aware output encoding, and anti-CSRF tokens. The effectiveness of these mitigations was verified for each vulnerability.

**Note:** All exploits were conducted in a controlled, isolated virtual machine environment for educational purposes.