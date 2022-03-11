/*VUE INSTANCE*/

const vm = Vue.createApp({
    data () {
        return {
            loading: false,
            show_result: false,
            gender_selected: 0,
            form: {
                father_bt: 1,
                mother_bt: 1
            },
            default: {
                father_bt: 1,
                mother_bt: 1
            },
        }
    },
  
    methods: {
        getResults() {
            let app = this
            app.loading = true

            app.calc().then( res => {
                app.gender_selected = res
                app.loading = false
                app.show_result = true
                app.$refs.serma_gpbt_results.scrollIntoView({behavior: "smooth"})  
            })

        },

        resetForm() {
            let app = this
            app.show_result = false
            app.gender_selected = 0
            app.form = Object.assign({}, app.default)
            app.$refs.serma_gpbt_container.scrollIntoView({behavior: "smooth"})
        },

        async calc() {
            let app = this

            let father = parseInt(app.form.mother_bt) || 0
		    let mother = parseInt(app.form.father_bt) || 0

            let sum = mother + father
    
            return sum % 2 === 0;

        }

    }
  })
  .mount('#serma-gpbt-container')
