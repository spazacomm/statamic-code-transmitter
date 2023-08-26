import CodeTransmitter from './components/code-transmitter';

Statamic.booting(() => {
    Statamic.$components.register('code_transmitter-fieldtype', CodeTransmitter);
});
