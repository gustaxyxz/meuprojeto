Set WshShell = CreateObject("WScript.Shell")
strDesktop = WshShell.SpecialFolders("Desktop")
Set oUrlLink = WshShell.CreateShortcut(strDesktop & "\CRM Metalurgica Oliveira.url")
oUrlLink.TargetPath = "http://localhost:8080/meuprojeto/orcamento-pdf.html"
oUrlLink.Save
WScript.Echo "Atalho criado com sucesso na Area de Trabalho!"
