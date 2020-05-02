const confirmdelete = new Vue({
    el: '#confirmdelete',
    data: {
        url_delete: ''


    },

    methods:{
        toConfirmDelete(id){
            //alert(id);
            this.url_delete = document.getElementById('url_to_delete').innerHTML+'/'+id;
             $('#deleteModal').modal('show');
        }
    }

});

