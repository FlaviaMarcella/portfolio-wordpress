param(
    [string]$SourceBaseUrl = "http://localhost:8088",
    [string]$TargetBaseUrl = "/~2024.1.08.025",
    [string]$OutputDir = "dist"
)

$ErrorActionPreference = "Stop"

if (Test-Path $OutputDir) {
    Remove-Item -Recurse -Force $OutputDir
}
New-Item -ItemType Directory -Path $OutputDir | Out-Null

$routes = @(
    @{ Path = "/"; OutFile = "index.html" },
    @{ Path = "/passatempos-e-interesses/"; OutFile = "passatempos-e-interesses/index.html" },
    @{ Path = "/trabalho-e-estudo/"; OutFile = "trabalho-e-estudo/index.html" },
    @{ Path = "/formacao-academica/"; OutFile = "formacao-academica/index.html" },
    @{ Path = "/contato/"; OutFile = "contato/index.html" }
)

foreach ($r in $routes) {
    $url = "$SourceBaseUrl$($r.Path)"
    Write-Host "Exportando $url ..."
    $res = Invoke-WebRequest -Uri $url -UseBasicParsing
    # Garantir decodificação UTF-8 correta a partir dos bytes da resposta
    $html = [System.Text.Encoding]::UTF8.GetString($res.RawContentStream.ToArray())
    # Remover cabeçalhos HTTP caso RawContentStream contenha apenas o body (no PS 5.1 RawContentStream é apenas o body)
    $html = $html.Replace($SourceBaseUrl, $TargetBaseUrl)

    $destPath = Join-Path $OutputDir $r.OutFile
    $destFolder = Split-Path $destPath -Parent
    if (-not (Test-Path $destFolder)) {
        New-Item -ItemType Directory -Path $destFolder -Force | Out-Null
    }
    [System.IO.File]::WriteAllText((Resolve-Path $destFolder).Path + "\" + (Split-Path $destPath -Leaf), $html, (New-Object System.Text.UTF8Encoding($false)))
}

# Copiar arquivos do tema (style.css e favicon.svg) para manter o mesmo caminho do WordPress
$themeDest = Join-Path $OutputDir "wp-content/themes/flavia-portfolio"
New-Item -ItemType Directory -Path $themeDest -Force | Out-Null
Copy-Item "wp-content/themes/flavia-portfolio/style.css" -Destination (Join-Path $themeDest "style.css") -Force
Copy-Item "wp-content/themes/flavia-portfolio/favicon.svg" -Destination (Join-Path $themeDest "favicon.svg") -Force
Copy-Item "wp-content/themes/flavia-portfolio/favicon.svg" -Destination (Join-Path $OutputDir "favicon.svg") -Force

Write-Host "Exportacao estatica concluida em '$OutputDir'!"
