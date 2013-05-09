'Par Jean-Sebastien Fauteux
Set WinScriptHost = CreateObject("WScript.Shell")
WinScriptHost.Run Chr(34) & "C:\Travail\copy_php.bat" & Chr(34), 0 
Set WinScriptHost = Nothing