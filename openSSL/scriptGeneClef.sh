#!/bin/bash

# Définition des fichiers
CA_KEY="ca.key"
CA_CERT="ca.crt"
CA_SERIAL="ca.srl"
SERVER_KEY="server.key"
SERVER_CSR="server.csr"
SERVER_CERT="server.crt"
SERVER_EXT="server.ext"

# Variables de la CA
CA_CN="CA_Broce"

# Variables du serveur
SERVER_CN="ex_apache_sec.com"
IP_SERVER="192.168.1.118"
# Création de la CA
echo "Création de la clé privée de la CA..."
openssl genrsa -out $CA_KEY 2048

echo "Création du certificat auto-signé de la CA..."
openssl req -x509 -new -key $CA_KEY -sha256 -days 3650 -out $CA_CERT -subj "/CN=$CA_CN"

# Création de la clé privée du serveur
echo "Création de la clé privée du serveur..."
openssl genrsa -out $SERVER_KEY 2048

# Création de la demande de signature du certificat serveur (CSR)
echo "Création de la demande de certificat du serveur..."
openssl req -new -key $SERVER_KEY -out $SERVER_CSR -subj "/CN=$SERVER_CN"

# Ajout de l'IP dans SAN
cat > $SERVER_EXT <<EOF
[ v3_ext ]
subjectAltName = IP:$IP_SERVER
EOF

# Signature du certificat du serveur par la CA
echo "Signature du certificat serveur avec la CA..."
openssl x509 -req -in $SERVER_CSR -CA $CA_CERT -CAkey $CA_KEY -CAcreateserial -out $SERVER_CERT -days 365 -sha256 -extfile $SERVER_EXT -extensions v3_ext

echo "Certificats générés avec succès."

