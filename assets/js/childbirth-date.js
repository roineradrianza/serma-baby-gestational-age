/*VUE INSTANCE*/
moment.locale('es')
const vm = Vue.createApp({
        data() {
            return {
                loading: false,
                show_result: false,
                results: {
                    fertile_date: {
                        from: moment().format('YYYY-MM-DD'),
                        to: moment().format('YYYY-MM-DD'),
                    },
                    conception_date: moment().format('YYYY-MM-DD'),
                    first_semester: moment().format('YYYY-MM-DD'),
                    second_semester: moment().format('YYYY-MM-DD'),
                    childbirth_date: moment().format('YYYY-MM-DD'),
                },
                default: {
                    fertile_date: {
                        from: moment().format('YYYY-MM-DD'),
                        to: moment().format('YYYY-MM-DD'),
                    },
                    conception_date: moment().format('YYYY-MM-DD'),
                    first_semester: moment().format('YYYY-MM-DD'),
                    second_semester: moment().format('YYYY-MM-DD'),
                    childbirth_date: moment().format('YYYY-MM-DD'),
                }
            }
        },

        methods: {
            getResults() {
                let app = this
                app.loading = true

                app.calc().then(res => {
                    app.results = res

                    app.loading = false
                    app.show_result = true
                    app.$refs.serma_cd_results.scrollIntoView({
                        behavior: "smooth"
                    })
                })

            },

            resetForm() {
                let app = this
                app.show_result = false
                app.$refs.childbirth_date_input.value = ''

                app.results = Object.assign({}, app.default)
                app.$refs.serma_cd_container.scrollIntoView({
                    behavior: "smooth"
                })
            },

            async calc() {
                let app = this

                let childbirth_date = app.$refs.childbirth_date_input.value

                let dateVal = childbirth_date.split('/')
                let date = `${dateVal[2]}-${dateVal[1]}-${dateVal[0]}`

                let fd1 = moment(date).add(10, 'days')

                let fd2 = moment(date).add(20, 'days')

                let cd = moment(date).add(14, 'days')

                let fte = moment(date).add(84, 'days')

                let ste = moment(date).add(189, 'days')

                let dd = moment(date).add(280, 'days')

                return {
                    fertile_date: {
                        from: fd1.format('YYYY-MM-DD'),
                        to: fd2.format('YYYY-MM-DD')
                    },
                    conception_date: cd.format('YYYY-MM-DD'),
                    first_semester: fte.format('YYYY-MM-DD'),
                    second_semester: ste.format('YYYY-MM-DD'),
                    childbirth_date: dd.format('YYYY-MM-DD'),
                }

            },

            formatDate({
                d = '',
                f = 'DD[/]MM[/]YYYY'
            }) {
                return moment(d).format(f)
            }

        }
    })
    .mount('#serma-cd-container')