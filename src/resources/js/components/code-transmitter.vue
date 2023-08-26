<template>
    <div class="code-fieldtype-container relative" :class="themeClass">
        <div v-text="modeLabel" class="code-mode"></div>
        <div ref="codemirror"></div>
    </div>
</template>

<script>
import CodeMirror from 'codemirror'

// Addons
import 'codemirror/addon/edit/matchbrackets'

// Keymaps
import 'codemirror/keymap/sublime'
import 'codemirror/keymap/vim'

// Modes
import 'codemirror/mode/css/css'
import 'codemirror/mode/htmlmixed/htmlmixed'
import 'codemirror/mode/javascript/javascript'

export default {
    mixins: [Fieldtype],
    data() {
        return {
            codemirror: null,
        }
    },
    computed: {
        modeLabel() {
            let label = this.config.mode.replace('text/x-', '');
            return label.replace('htmlmixed', 'html');
        },
        exactTheme() {
            return (this.config.theme === 'light') ? 'default' : 'material';
        },
        themeClass() {
            return 'theme-' + this.config.theme;
        },
        replicatorPreview() {
            return this.value ? this.value.replace('<', '&lt;') : '';
        },
        readOnlyOption() {
            return this.isReadOnly ? 'nocursor' : false;
        },
        getValue() {
            return this.value ? this.value : this.config.code;
        },
    },
    mounted() {
        this.codemirror = CodeMirror(this.$refs.codemirror, {
            value: this.getValue,
            mode: this.config.mode,
            addModeClass: true,
            keyMap: this.config.key_map,
            tabSize: this.config.indent_size,
            indentWithTabs: this.config.indent_type !== 'spaces',
            lineNumbers: this.config.line_numbers,
            lineWrapping: this.config.line_wrapping,
            matchBrackets: true,
            readOnly: this.readOnlyOption,
            theme: this.exactTheme,
        });

        this.codemirror.on('change', (cm) => {
            this.update(cm.doc.getValue());
        });

        this.codemirror.on('focus', () => this.$emit('focus'));
        this.codemirror.on('blur', () => this.$emit('blur'));

        // Refresh to ensure proper size
        // Most applicable when loaded by another field like Bard, etc
        this.$nextTick(function () {
            this.codemirror.refresh();
        });
    },
    watch: {
        value(value, oldValue) {
            if (value === this.codemirror.doc.getValue()) return;
            this.codemirror.doc.setValue(value);
        },
        readOnlyOption(val) {
            this.codemirror.setOption('readOnly', val);
        },
    },
    methods: {
        focus() {
            this.codemirror.focus();
        },
    },
};
</script>
