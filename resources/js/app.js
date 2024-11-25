// import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';
// import Clipboard from '@ryangjchandler/alpine-clipboard'
import Moment from 'moment';
import Pikaday from 'pikaday';
import 'preline';
import HSFileUpload from 'preline/dist/file-upload.js';
import _ from 'lodash';
import Dropzone from 'dropzone';


// Alpine.plugin(Clipboard)
// Livewire.start()
window.Pikaday = Pikaday;
window.moment = Moment;
window.HSFileUpload = HSFileUpload;
window._ = _;
window.Dropzone = Dropzone;




