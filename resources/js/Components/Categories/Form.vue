<script>
    export default {
        name: 'CategoriesForm'
    }

</script>

<script setup>
    defineProps({
        form: {
            type: Object,
            required: true
        },
        updating: {
            type: Boolean,
            required: false, 
            default: false
        }
    })
</script>
