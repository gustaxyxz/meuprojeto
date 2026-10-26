@echo off
title Abrindo CRM Metalurgica Oliveira...
echo ========================================================
echo  METALURGICA OLIVEIRA - GESTOR DE PROPOSTAS E VENDAS
echo ========================================================
echo Abrindo o sistema no seu navegador padrao...

:: Tenta criar o atalho na Área de Trabalho caso ainda não exista
if not exist "%USERPROFILE%\Desktop\CRM Metalurgica Oliveira.url" (
    cscript //nologo criar-atalho.vbs >nul 2>&1
)

:: Abre no navegador
start http://localhost:8080/meuprojeto/orcamento-pdf.html

echo Sistema aberto!
timeout /t 2 >nul
exit
