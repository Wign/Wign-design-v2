<template>
    <autocomplete
        :search="search"
        placeholder="Søg Wign"
        aria-label="Søg Wign"
        :get-result-value="getResultValue"
        @submit="handleSubmit"
        :debounce-time="300"
    />
</template>

<script>
    const searchUrl = 'https://pn3st7yiac.execute-api.eu-central-1.amazonaws.com/dev/';
    const params = 'suggester=autocomplete';

    export default {
        methods: {
            search(input) {
                const url = `${searchUrl}?${
                    params
                }&q=${encodeURI(input)}`

                return new Promise(resolve => {
                    if (input.length < 3) {
                        return resolve([])
                    }

                    fetch(url, {
                        mode: 'cors'
                    })
                        .then(response => response.json())
                        .then(data => {
                            resolve(data.suggest.suggestions);
                        })
                })
            },
            getResultValue(result) {
                return result.suggestion;
            },
            handleSubmit(result) {
                window.open(`/sign/${
                    encodeURI(result.suggestion)
                }`)
            }
        }
    }
</script>
