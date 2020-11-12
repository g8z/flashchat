// globals
var last_focused_select_option_nr = 0;

function my_getbyid(id)
{
        itm = null;

        if (document.getElementById)
        {
                itm = document.getElementById(id);
        }
        else if (document.all)
        {
                itm = document.all[id];
        }
        else if (document.layers)
        {
                itm = document.layers[id];
        }

		return itm;
}

function exchange(select_nr_1, select_nr_2)
{
        option_nr_1 = get_selected(select_nr_1);
        option_nr_2 = get_selected(select_nr_2);

        option_id_1 = html_array2d(optionstr, select_nr_1, option_nr_1);
        option_id_2 = html_array2d(optionstr, select_nr_2, option_nr_2);

        new_option_id_1 = html_array2d(optionstr, select_nr_1, option_nr_2);
        new_option_id_2 = html_array2d(optionstr, select_nr_2, option_nr_1);

        my_getbyid(new_option_id_1).selected = true;
        my_getbyid(new_option_id_2).selected = true;

        my_getbyid(option_id_1).selected = false;
        my_getbyid(option_id_2).selected = false;
}


function first()
{
        result = 1;
        min = option_count;

        for (n = 1; n < option_count; n++)
        {
                temp = get_selected(n);
                if (temp) {
                        if ( temp < min ) {
                                min = temp;
                                result = n;
                        }
                }
        }
        return result;
}

function last()
{
        result = option_count-1;
        max = 0;

        for (k = 1; k < option_count; k++)
        {
                temp = get_selected(k);
                if (temp) {
                        if ( temp > max ) {
                                max = temp;
                                result = k;
                        }
                }
        }
        return result;
}

function uper(select_nr)
{
        if ( select_nr == first()) {
                return last();
        }
        option_nr = get_selected(select_nr);
        if (!option_nr) {

                return false;
        }

        for (dif = 1; dif < option_count; dif++)
        {
                for (slct = 1; slct < option_count; slct++)
                {
                        uper_nr = get_selected(slct);
                        if (uper_nr) {
                                if ( (option_nr - uper_nr) == dif ) {
                                        return slct;
                                }
                        }
                }
        }
        return null;
}

function get_selected(select_nr)
{
        for (i = 1; i < option_count; i++)
        {
                id = html_array2d(optionstr,select_nr,i);
			    if (my_getbyid(id)) {
                        if (my_getbyid(id).selected)
                        {
                                return i;
                        }
                }
        }
        return null;
}

function find_select(with_option_nr)
{
        for (j = 1; j < option_count; j++)
        {
                if ( with_option_nr == get_selected(j))
                {
                        return j;
                }
        }
        return null;
}

function find_select2(with_option_nr, not_this_select)
{
        for (j = 1; j < option_count; j++)
        {
                if (j != not_this_select) {
                        if ( with_option_nr == get_selected(j))
                        {
                                return j;
                        }
                }
        }
        return null;
}

function onbttnclick(buttonid, editid)
{
        my_getbyid(buttonid).disabled = true;
        if (my_getbyid(editid).style)
        {
                my_getbyid(editid).style.borderWidth = '2px';
                my_getbyid(editid).style.borderStyle = 'inset';
        }
        if (my_getbyid(editid).borderWidth)
        {
                my_getbyid(editid).borderWidth = '2px';
                my_getbyid(editid).borderStyle = 'inset';
        }
}

function onnamefocus(btn_id, text_id)
{
        if (my_getbyid(btn_id).disabled == false) {
                my_getbyid(text_id).blur();
        }
}

function html_array(name,index)
{
        return name + '[' + index + ']';
}

function html_array2d(name,index1,index2)
{

        return name + '[' + index1 + ']' + '[' + index2 + ']';
}

function extract_index1(id)
{
        return id.substring(id.indexOf('[') + 1, id.indexOf(']'));
}
function extract_index2(id)
{
        return id.substring(id.indexOf('][') + 2, id.indexOf(']',id.indexOf(']') + 1));
}
function row_change(nr)
{
        id = html_array(hidden,nr);
        my_getbyid(id).disabled = false;
}
function change(select_nr)
{
        row_change(select_nr);
        selected_option = get_selected(select_nr);
        select_with_option = find_select2(selected_option, select_nr);
        if (select_with_option) {
                my_getbyid(html_array2d(optionstr, select_with_option, last_focused_select_option_nr)).selected = true;
                row_change(select_with_option)
        }
        last_focused_select_option_nr = get_selected(select_nr);
}

function focused(select_nr)
{
        last_focused_select_option_nr = get_selected(select_nr);
}

function bump_up(this_nr)
{
        uper_select_nr = uper(this_nr);
        if (uper_select_nr) {
                exchange(this_nr, uper_select_nr);
                row_change(this_nr)
                row_change(uper_select_nr)
        }
}

function disable_row(row_nr)
{
        id = html_array(permanent ,row_nr);
        if (obj = my_getbyid(id) ){
                obj.disabled = true;
        }
        id = html_array(ispublic ,row_nr);
        if (obj = my_getbyid(id) ){
                obj.disabled = true;
        }
        id = html_array(name ,row_nr);
        if (obj = my_getbyid(id) ){
                obj.disabled = true;
        }
        id = html_array(selectstr ,row_nr);
        if (obj = my_getbyid(id) ){
                obj.disabled = true;
        }
        id = html_array(deleteroom ,row_nr);
        if (obj = my_getbyid(id) ){
                obj.disabled = true;
        }
}

function submit_form()
{
        for (s = 1; s < option_count; s++)
        {
                id = html_array(hidden ,s);
                if ( (my_getbyid(id)) && (my_getbyid(id).disabled) ){
                        disable_row(s);
                }
        }
}

function perm_change(row_nr)
{
		row_change(row_nr);

        obj1 = my_getbyid(html_array(selectstr, row_nr));
        obj2 = my_getbyid(html_array(permanent, row_nr));
		///alert('3');

    if ( obj1 && obj2 )
	{
          obj1.disabled = !obj2.checked;
    }
}

function decision(message, url)
{
	if(window.confirm(message)) fwd(url);
}

function fwd(url)
{
	window.location.href = url;
}

function neworder(selectElem, id)
{
	var newValue = selectElem.value;
	var oldValue = document.getElementById('oldOrder_' + id).value;
	var elements = cnf_form.elements;
	var i = 0;
	while(i < elements.length)
	{
		if(elements.item(i).type == 'select-one' && elements.item(i).value == newValue && elements.item(i) != selectElem)
		{
			cnf_form.elements.item(i).value = oldValue;
			document.getElementById('oldOrder_' + cnf_form.elements.item(i).id).value = oldValue;
			document.getElementById('oldOrder_' + id).value = newValue;
		}
		i++;
	}
}
