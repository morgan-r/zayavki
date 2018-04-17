/* Russian (windows-1251) initialisation for the jQuery UI date picker plugin. */
/* Written by Almaz Rafikov. */
jQuery(function($){ 
    $.datepicker.regional['ru'] = {clearText: '��������', clearStatus: '',
    closeText: '�������', closeStatus: '',      
    prevText: '&lt;����',  prevStatus: '',      
    nextText: '����&gt;', nextStatus: '',       
    currentText: '�������', currentStatus: '',      
    monthNames: ['������','�������','����','������','���','����',       
    '����','������','��������','�������','������','�������'],       
    monthNamesShort: ['���','���','���','���','���','���',      
    '���','���','���','���','���','���'],       
    monthStatus: '', yearStatus: '',        
    weekHeader: '��', weekStatus: '',       
    dayNames: ['�����������','�����������','�������','�����','�������','�������','�������'],        
    dayNamesShort: ['���','���','���','���','���','���','���'],     
    dayNamesMin: ['��','��','��','��','��','��','��'],      
    dayStatus: 'DD', dateStatus: 'D, M d',      
    dateFormat: 'yy.mm.dd', firstDay: 1,        
    initStatus: '', isRTL: false};  
    $.datepicker.setDefaults($.datepicker.regional['ru']);
});