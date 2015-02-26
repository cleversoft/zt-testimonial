function jInsertFieldValue(value, id) {
    var old_value = document.id(id).value;
    if (old_value != value) {
        var elem = document.id(id);
        elem.value = value;
        elem.fireEvent("change");
        if (typeof(elem.onchange) === "function") {
            elem.onchange();
        }
    }
}

function addthumbnail(imgsrc, editor) {
    var JURI= $('base_url_testimonial').value;
    var avatarImg = $(editor).getParent().getElement('img');
    var testUrl = 'http';
    if (imgsrc.toLowerCase().indexOf(testUrl.toLowerCase()) != -1) {
        avatarImg.src = imgsrc;
    } else {
        avatarImg.src = JURI + imgsrc;
    }
    avatarImg.setProperty('width', '90px');
    avatarImg.setProperty('height', '60px');
}
function removeElement(element) {
    if (confirm('Remove this testimonial') + ' ?') {
        element.destroy();
        saveTestimonial();
    }
}

// check index
function checkIndex(i) {
    while ($('ztTestimonial' + i))
        i++;
    return i;
}

function makesortables() {
    var sb = new Sortables('ztTestimonialList', {
        /* set options */
        clone: true,
        revert: true,
        handle: '.ztTestimonialHandle',
        /* initialization stuff here */
        initialize: function() {

        },
        /* once an item is selected */
        onStart: function(el) {
            el.setStyle('background', '#add8e6');
        },
        /* when a drag is complete */
        onComplete: function(el) {
            el.setStyle('background', '#fff');
        },
        onSort: function(el, clone) {

        }
    });
}
function addTestimonial(element) {
    if(!instanceOf(element, Object) ){
        var element = {testimonial: '', name:'', linkName:'', linkAvatar:'', email:'', avatar:'', position:'', twitter:'', website:'', linkedin:'', google:'', printerest:'', facebook:'' ,urlAvatar:''};
    }

    if (!element.testimonial){
        element.testimonial = '';
    }
    element.testimonial = element.testimonial.replace(/\|dq\|/g, "&quot;");

    if (!element.linkName){
        element.linkName = '';
    }
    if (!element.linkAvatar){
        element.linkAvatar = '';
    }
    if (!element.name){
        element.name = '';
    }
    if (!element.email){
        element.email = '';
    }
    if (!element.position){
        element.position = '';
    }

    if (!element.website){
        element.website = '';
    }

    if (!element.linkedin){
        element.linkedin = '';
    }
    if(!element.google) {
        element.google = '';
    }
    if(!element.printerest) {
        element.printerest = '';
    }

    if (!element.facebook){
        element.facebook = '';
    }

    if (!element.twitter){
        element.twitter = '';

    }



    if (!element.avatar){
        element.avatar = '../modules/mod_zt_testimonial/admin/element/unknown.png';
    }
    if (!element.urlAvatar){
        element.urlAvatar = '';
    }
    var index = checkIndex(0);
    var ztTestimonial = new Element('li', {
        'class': 'ztTestimonial',
        'id': 'ztTestimonial' + index
        ,events:{ mouseenter:function(){btnRemover.show();},
            mouseleave:function(){btnRemover.hide();}
        }
    });
    //btn remover
    var btnRemover = new Element('a',{name:'ztDelete'+index, 'class':'ztDelete ', events:{click:function(){removeElement(ztTestimonial);}}});
    var iRemove = new Element('i',{'class':'fa fa-times'})
    btnRemover.grab(iRemove);
    btnRemover.hide()
    //begin handle
    var testHandle = new Element('div',{'class':'ztTestimonialHandle'});
    var testHandleIndex = new Element('div',{'class':'ztTestimonialnumber',text:index});
    var testSpan = new Element('span',{'class':'fa fa-arrows'});
    testHandle.adopt(testHandleIndex,testSpan);
    //end handle
    //begin testimonial
    var content = new Element('div',{});
    var lblContent = new Element('span',{'class':'help-block zt-testimonial-title', text: 'Testimonial '+index});
    var txtContent = new Element('textarea',{'class':'testimonial',name:'testimonial',rows:6,value:element.testimonial});
    content.adopt(lblContent,txtContent);
    //end testimonial
    //begin avatar
    var urlAvatar = new Element('input',{type:'text',id:'urlAvatar'+index,'class':'urlAvatar hide',value:element.urlAvatar,events:{change:function(){
        addthumbnail(this.value,this);
    }}});
    var avatar = new Element('div',{});
    var avatarImg = new Element('div',{'class':'ztAvatar'});
    avatarImg.set('html','<img src="' + element.avatar + '" width="90" height="60"/></div>');
    var btnSelectAvatar = new Element('a',{'class':'modal btn',rel:"{handler: 'iframe', size: {x: 800, y: 500}}",href:'index.php?option=com_media&view=images&tmpl=component&fieldid=urlAvatar'+index,title:"Select Avatar",text:'Select Avatar'});
    avatar.adopt(urlAvatar, avatarImg, btnSelectAvatar);
    //end avatar
    //begin name- email - position
    var name = new Element('div',{});
    var lblName = new Element('span',{'class':'zt-testimonial-label', text: 'Name'});
    var txtName = new Element('input',{'class':'name',name:'name', type:'text',value:element.name});
    name.adopt(lblName,txtName);

    var linkName = new Element('div',{});
    var lblLinkName = new Element('span',{'class':'zt-testimonial-label', text: 'Link Name'});
    var txtLinkName = new Element('input',{'class':'link-name',name:'linkName', type:'text',value:element.linkName});
    linkName.adopt(lblLinkName,txtLinkName);
    var linkAvatar = new Element('div',{});
    var lblLinkAvatar = new Element('span',{'class':'zt-testimonial-label', text: 'Link Avatar'});
    var txtLinkAvatar = new Element('input',{'class':'link-avatar',name:'linkAvatar', type:'text',value:element.linkAvatar});
    linkAvatar.adopt(lblLinkAvatar,txtLinkAvatar);

    var email = new Element('div',{});
    var lblEmail = new Element('span',{'class':'zt-testimonial-label', text: 'Email'});
    var txtEmail = new Element('input',{'class':'email',name:'email', type:'text',value:element.email});
    email.adopt(lblEmail,txtEmail);

    var position = new Element('div',{});
    var lblPosition = new Element('span',{'class':'zt-testimonial-label', text: 'Position'});
    var txtPosition = new Element('input',{'class':'position',name:'position', type:'text',value:element.position});
    position.adopt(lblPosition,txtPosition);

    var website = new Element('div',{});
    var lblWebsite = new Element('span',{'class':'zt-testimonial-label', text: 'Website'});
    var txtWebsite = new Element('input',{'class':'website',name:'website', type:'text',value:element.website});
    website.adopt(lblWebsite,txtWebsite);
    //console.log(txtWebsite.value);

    var facebook = new Element('div',{});
    var lblFacebook = new Element('span',{'class':'zt-testimonial-label', text: 'Facebook'});
    var txtFacebook = new Element('input',{'class':'facebook',name:'facebook', type:'text',value:element.facebook});
    facebook.adopt(lblFacebook,txtFacebook);

    var twitter = new Element('div',{});
    var lblTwitter = new Element('span',{'class':'zt-testimonial-label', text: 'Twitter'});
    var txtTwitter = new Element('input',{'class':'twitter',name:'twitter', type:'text',value:element.twitter});
    twitter.adopt(lblTwitter,txtTwitter);
    //them
    var google = new Element('div',{});
    var lblGoogle = new Element('span',{'class':'zt-testimonial-label', text: 'Google'});
    var txtGoogle = new Element('input',{'class':'google',name:'google', type:'text',value:element.google});
    google.adopt(lblGoogle,txtGoogle);

    var linkedin = new Element('div',{});
    var lblLinkedin= new Element('span',{'class':'zt-testimonial-label', text: 'Linkedin'});
    var txtLinkedin = new Element('input',{'class':'linkedin',name:'linkedin', type:'text',value:element.linkedin});
    linkedin.adopt(lblLinkedin,txtLinkedin);

    var printerest = new Element('div',{});
    var lblPrinterest = new Element('span',{'class':'zt-testimonial-label', text: 'Printerest'});
    var txtPrinterest = new Element('input',{'class':'printerest',name:'printerest', type:'text',value:element.printerest});
    printerest.adopt(lblPrinterest,txtPrinterest);
    //end name- email - position

    var info = new Element('div',{'class':'row-fluid info'});
    var infoLeft = new Element('div',{'class':'span4'})
    var infoRight = new Element('div',{'class':'span8'})
    infoLeft.adopt(avatar);
    infoRight.adopt(name, linkName, linkAvatar, email, position, website, facebook, twitter, google, linkedin, printerest);
    info.adopt(infoLeft,infoRight);

    var container = new Element('div',{'class':'container'});
    container.adopt(btnRemover,content,info)

    ztTestimonial.adopt(testHandle, container);

    document.id('ztTestimonialList').adopt(ztTestimonial);
    makesortables();
    saveTestimonial();
    SqueezeBox.initialize({});
    SqueezeBox.assign(ztTestimonial.getElement('a.modal'), {
        parse: 'rel' });


}

function loadTestimonials() {
    var testimonials = JSON.decode(document.id('jform_params_arrayTestimonial').value.replace(/\|qq\|/g, "\""));
    if (testimonials) {
        testimonials.each(function(element) {
            addTestimonial(element);
        });
    }
}


function saveTestimonial() {
    var i = 0;
    var testimonials = new Array();
    document.id('ztTestimonialList').getElements('li.ztTestimonial').each(function(el) {
        var element = new Object();
        element.testimonial     = el.getElement('.testimonial').value;
        element.avatar          = el.getElement('img').src;
        element.urlAvatar       = el.getElement('.urlAvatar').value;
        element.name            = el.getElement('.name').value;
        element.linkName        = el.getElement('.link-name').value;
        element.linkAvatar      = el.getElement('.link-avatar').value;

        element.email           = el.getElement('.email').value;
        element.position        = el.getElement('.position').value;
        element.twitter         = el.getElement('.twitter').value;
        element.website         = el.getElement('.website').value;
        element.facebook        = el.getElement('.facebook').value;
        element.google          = el.getElement('.google').value;
        element.linkedin        = el.getElement('.linkedin').value;
        element.printerest      = el.getElement('.printerest').value;


        testimonials[i]=element;
        i++;

    });

    var json = JSON.encode(testimonials);
    json = json.replace(/"/g, "|qq|");
    document.id('jform_params_arrayTestimonial').value = json;

}

window.addEvent('domready', function() {
    loadTestimonials();

    var script = document.createElement("script");
    script.setAttribute('type', 'text/javascript');
    script.text = "Joomla.submitbutton = function(task){"
        + "saveTestimonial();"
        + "if (task == 'module.cancel' || document.formvalidator.isValid(document.id('module-form'))) {	Joomla.submitform(task, document.getElementById('module-form'));"
        + "if (self != top) {"
        + "window.top.setTimeout('window.parent.SqueezeBox.close()', 1000);"
        + "}"
        + "} else {"
        + "alert('Formulaire invalide');"
        + "}}";
    document.body.appendChild(script);

});