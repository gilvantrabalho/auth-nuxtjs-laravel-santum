<template>
    <div class="form-group">
        <label :for="for_id" class="form-label">{{ label }}: </label>
        <input :id="for_id" v-model="model" :type="type" class="form-control" :placeholder="placeholder">
    </div>
</template>

<script>
export default {
    props: ['for_id', 'label', 'type', 'placeholder'],

    computed: {
        model: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit('input', value);
            },
        }
    }
}
</script> 