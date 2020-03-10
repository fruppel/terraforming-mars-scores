<template>
    <div class="calculate-button">
        <a class="btn btn-block btn-outline-success" @click="calculate">
            <slot></slot>
        </a>
        <div class="modal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sieger</h5>
                    </div>
                    <div class="modal-body">
                        <p>Content :-)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['href'],

        mounted() {
        },

        methods: {
            calculate() {
                axios.get(this.href).then((response) => {
                    if (response.status === 200) {

                        $('.modal').modal({});
                        // window.location.reload();
                    }
                });
            }
        }
    }
</script>
