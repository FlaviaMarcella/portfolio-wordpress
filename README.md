# Portfólio Pessoal em WordPress — Flávia Gonçalves

Ambiente WordPress completo configurado via Docker + WP-CLI com tema personalizado (`flavia-portfolio`) e todas as 5 páginas do portfólio importadas como blocos Gutenberg nativos.

## 🚀 Acesso Rápido

- **Site (Front-end):** [http://localhost:8088](http://localhost:8088)
- **Painel Administrativo (`wp-admin`):** [http://localhost:8088/wp-admin](http://localhost:8088/wp-admin)
  - **Usuário:** `flavia` (ou `flaviamgm011@gmail.com`)
  - **Senha:** `flavia123`

## 📄 Páginas Importadas

As páginas abaixo foram criadas automaticamente a partir dos arquivos em `portfolio_original/paginas-wordpress/`:

1. **Início** (`/`) — `1-inicio.html` (definida como Página Inicial estática)
2. **Passatempos e Interesses** (`/passatempos-e-interesses/`) — `2-passatempos-e-interesses.html`
3. **Trabalho e Estudo** (`/trabalho-e-estudo/`) — `3-trabalho-e-estudo.html`
4. **Formação Acadêmica** (`/formacao-academica/`) — `4-formacao-academica.html`
5. **Contato** (`/contato/`) — `5-contato.html`

## 🛠️ Comandos Úteis (Docker)

```powershell
# Iniciar o ambiente WordPress
docker compose up -d db wordpress

# Parar os containers (mantendo os dados salvos no banco)
docker compose stop

# Reexecutar o script de provisionamento das páginas e menu
docker compose run --rm wpcli wp eval-file /scripts/setup-wp.php
```

## 🎨 Estrutura do Tema (`wp-content/themes/flavia-portfolio`)

- `style.css` — Estilização responsiva com Container Queries (`@container`), modo escuro/claro e tipografia fluida (`clamp()`).
- `functions.php` — Suporte a menus, blocos Gutenberg, fontes e otimização de LCP (`fetchpriority="high"` na foto de perfil).
- `header.php` / `footer.php` — Cabeçalho com menu dinâmico do WordPress e alternador de tema claro/escuro.
- `front-page.php` — Template da página inicial com destaque para a apresentação e atalhos para as demais seções.
- `page.php` / `index.php` — Templates padrão para exibição e edição das páginas no editor de blocos do WordPress.
