<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/vue@next"></script>
    <script src='https: //cdn.jsdelivr.net/npm/axios/dist/axios.min.js'></script>
    <title>Newsletters inscription</title>
</head>

<body>
    <div class="container">
        <div id='app'>
            <h1>
                Inscription à la Newsletters
            </h1>

            <p class="test">
                Email test <span>{{ email  }}</span>
            </p>
            <div class='form' @submit.prevent.subscribeToNewsletters action='model.php?action=subscribeToNewsletters
                ' method='POST'>
                <div class='newsletters'>

                    <label for='first_name'>
                        <p>Prénoms: </p>
                        <input type='text' required name='first_name'>
                    </label>

                    <label for='last_name'>
                        <p>Nom: </p>
                        <input type='text' required name='last_name'>
                    </label>

                    <label for='email'>
                        <p>Email: </p>
                        <input type='text' required name='email' v-model='email'>
                    </label>

                    <label for='country'>
                        <p>Pays: </p>
                        <input type='text' required name='country' v-model='country'>
                    </label>

                    <p class='disclaimer'>
                        Notez que votre adresse mail ne sera jamais communiquée à autrui.
                        Vous ne serez pas non plus inondé de messages de notre part (environ un mail hebdomadaire).

                    </p>

                    <button type='submit'>
                        Valider
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
    const {
        createApp
    } = Vue

    createApp({
        data() {
            return {
                message: 'veuilez entrer un email test',
                email: 'email',
                first_name: '',
                last_name: '',
                country: ''

            }
        },
        mounted: function() {
            // this.getAllAppartments();
        },
        methods: {
            subscribeToNewsletters() {
                axios.post("model.php?action=subscribeToNewsletters").then(response =>
                    this.message = response.data);
                if (response.data === 200) {
                    console(response);
                }

            }
        }
    }).mount('#app')
    </script>
</body>

</html>