function confirmDelete()
{
	if(confirm('Are you sure to delete this item?') == true) {
		return true;
	}
	else {
		return false;
	}
}
