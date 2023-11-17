import instance from "..";

export const getGroups = (search = undefined) => {
    console.log('전체 그룹 조회');

    if(search) {
        return instance.get('/groups', null, {
            headers: {},
            params: {search: search}
        });
    } else {
        return instance.get('/groups', null, {
            headers: {},
            params: {}
        });
    }
};

export const getGroupDetail = (groupId) => {
    console.log('특정 그룹 조회.');
    
    return instance.get(`/groups/${groupId}`, null, {
        headers: {},
        params: {}
    });
};