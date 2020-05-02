const apicategory = new Vue({
    el: '#apicategory',
    data: {
        name: '',
        slug: '',
        div_slug_message: '',
        div_slug_class: '',
        div_visibility: false,
        button_disable: 0

    },
    computed: {
        generateSlug: function () {
            var char = {
                "á":"a","é":"e","í":"i","ó":"0","ú":"u",
                "Á":"A","É":"E","Í":"I","Ó":"O","Ú":"U",
                "Ñ":"N","ñ":"n"," ":"-","_":"-"
            }
            var expres = /[áéíóúÁÉÍÓÚñÑ_ ]/g;
            this.slug =this.name.trim().replace(expres, function (e) {
                return char[e];
            }).toLowerCase();

            return this.slug;
        }
    },
    methods:{
        getCategory(){

            if (this.slug)
            {
                let url="/api/category/"+this.slug;
                axios.get(url).then(response => {
                    this.div_slug_message = response.data;
                    if (this.div_slug_message != "")
                    {
                        this.div_slug_class = 'badge badge-danger';
                        this.div_slug_message = 'Slug already exists';
                        this.button_disable = 1;
                    }
                    else
                    {
                        this.div_slug_class = 'badge badge-success';
                        this.div_slug_message = 'Slug available';
                        this.button_disable = 0;
                    }
                    this.div_visibility = true;
                })
            }
            else
            {
                this.div_slug_class = 'badge badge-danger';
                this.div_slug_message = 'Category name is required';
                this.button_disable = 1;
                this.div_visibility = true;
            }

        }
    },
    mounted()
    {
         if (document.getElementById('edit'))
        {
            this.name = document.getElementById('auxName').innerHTML;
            this.button_disable = 0;
        }
    }
});

