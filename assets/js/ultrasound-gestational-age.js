/*VUE INSTANCE*/

const vm = Vue.createApp({
        data() {
            return {
                loading: false,
                show_result: false,
                embryo_length_input: 25,
                results: {
                    date: moment().format('YYYY-MM-DD'),
                    day: '',
                    week: '',
                },
                default: {
                    date: moment().format('YYYY-MM-DD'),
                    day: '',
                    week: '',
                }
            }
        },

        methods: {
            getResults() {
                let app = this
                app.loading = true

                app.calc().then(res => {
                    app.results.date = res.date
                    app.results.day = res.day
                    app.results.week = res.week

                    app.loading = false
                    app.show_result = true
                    app.$refs.serma_ugc_results.scrollIntoView({
                        behavior: "smooth"
                    })
                })

            },

            resetForm() {
                let app = this
                app.show_result = false
                app.embryo_length_input = 25

                app.results = Object.assign({}, app.default)
                app.$refs.serma_ugc_container.scrollIntoView({
                    behavior: "smooth"
                })
            },

            async calc() {
                let app = this

                let embryo_length = app.embryo_length_input

                let termesmith = (8.052 * Math.sqrt(embryo_length) + 23.73)
                termesmith = Math.round(termesmith)
                termesmith = termesmith / 7

                let weeks = Math.floor(termesmith)
                let days = Math.round((termesmith-Math.floor(termesmith))*7)

                return {
                    day: days,
                    week: weeks
                }

            }

        }
    })
    .mount('#serma-ugc-container')