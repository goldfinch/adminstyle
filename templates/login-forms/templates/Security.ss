<!DOCTYPE html>
<html lang="$ContentLocale">
    <head>
        <% if $SiteConfig.Title %>
            <title>$SiteConfig.Title: <%t SilverStripe\LoginForms.LOGIN "Log in" %></title>
            $Metatags(false).RAW
        <% else %>
            $Metatags.RAW
        <% end_if %>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="color-scheme" content="light <% if $darkModeIsEnabled() %>dark<% else %>only<% end_if %>" />
        <% if $SiteConfig.ThemeEnchantment %>
            <% require css("goldfinch/extra-assets:client/dist/font-opensans.css") %>
            <% require css("goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-admin.css") %>
            <% require css("goldfinch/enchantment:client/dist/enchantment/assets/bundle-silverstripe-login-forms.css") %>
            <% if $darkModeIsEnabled() %>
                <% require css("goldfinch/enchantment:client/dist/enchantment/assets/dark-mode-silverstripe-login-forms.css") %>
            <% end_if %>
            <% require css("goldfinch/enchantment:client/dist/enchantment/assets/enchantment-style.css") %>
        <% else %>
            <% require css("silverstripe/admin: client/dist/styles/bundle.css") %>
            <% require css("silverstripe/login-forms: client/dist/styles/bundle.css") %>
            <% if $darkModeIsEnabled() %>
                <% require css("silverstripe/login-forms: client/dist/styles/darkmode.css") %>
            <% end_if %>
        <% end_if %>
        <% require javascript("silverstripe/login-forms: client/dist/js/bundle.js") %>
        <style>
          input:-webkit-autofill,
          input:-webkit-autofill:hover,
          input:-webkit-autofill:focus,
          input:-webkit-autofill:active  {
            color : black !important;
            -webkit-text-fill-color: black !important;
            -webkit-box-shadow: 0 0 0 1000px white inset !important;
            -webkit-background-clip: text !important;
            background-clip: text !important;
          }

          .login-form__message--warning, .message.warning {
            color: var(--bs-danger) !important;
            font-weight: bold;
          }
          .btn-success, .btn-primary, input[type=submit] {
            background-color: #85ffa2 !important;
            outline-color: #85ffa2 !important;
            color: #00322f !important;
            font-weight: bold;
          }
          input {
            color: #00322f !important;
          }
          a, .login-form {
            color: #00322f !important;
          }
        </style>

    </head>
    <body style="background-color: #00322f; overflow-y: scroll; height: auto; padding: 80px 0; justify-content: flex-start;" <% if $darkModeIsEnabled() %>class="dark-mode-enabled"<% end_if %>>
        <% include AppHeader %>

        <main class="login-form">
            <div class="login-form__header">
            <% if $Title %>
                <h2 class="login-form__title">$Title</h2>
            <% end_if %>
            </div>

            <% if $Message %>
                <p class="login-form__message
                    <% if $MessageType && not $AlertType %>login-form__message--$MessageType<% end_if %>
                    <% if $AlertType %>login-form__message--$AlertType<% end_if %>"
                >
                    $Message
                </p>
            <% end_if %>

            <% if $Content && $Content != $Message %>
                <div class="login-form__content">$Content</div>
            <% end_if %>

            $Form
        </main>

        <footer class="silverstripe-brand">
            <% include SilverStripeLogo %>
        </footer>
        <%-- include BackgroundAnimation --%>
    </body>
</html>
